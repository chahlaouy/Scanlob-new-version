<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Offers;
use App\Models\User;
use App\Models\Command;
use App\Models\Qrcode;

class CartController extends Controller
{
    public function addToCart(Request $request){

        $request->validate([
            'quantity'  => 'required'
        ]);

        $userID = session('loggedUserId');
        $rowId = rand(0,1000);
        $offer = Offers::find($request->id);
        if ($offer) {
            // add the product to cart
            \Cart::session($userID)->add(array(
                'id' => $rowId,
                'name' => $offer->title,
                'price' => $offer->price,
                'quantity' => $request->quantity,
                'attributes' => array(),
                'associatedModel' => $offer
            ));
            return back()->with('success', "Offre Ajouter avec success");

        } else {
            return back()->with('fail', "Quelque chose ne va pas, veuillez réessayer plus tard.");
        }
        
    }
    
    public function getCart(){

        $userID = session('loggedUserId');
        $items = \Cart::session($userID)->getContent();

        $total = 0;

        // dd($items);
        foreach($items as $item) {
            $total = $total + (intval($item->quantity) * $item->price);
        }

        $data   =   [
            'loggedUserInfo'  =>  User::where('id', '=', $userID)->first(),
            'items' => $items,
            'total' => $total
        ];
        return view('cart-items',  $data);
    }
    public function deleteCart($id){

        $userID = session('loggedUserId');
        \Cart::session($userID)->remove($id);
        $items = \Cart::session($userID)->getContent();
        $data   =   [
            'loggedUserInfo'  =>  User::where('id', '=', $userID)->first(),
            'items' => $items
        ];
        return back()->with('success', 'Offre enléver avec succees');
    }
    public function checkout(){
        // Enter Your Stripe Secret

        \Stripe\Stripe::setApiKey('sk_test_51HlQt5AOYmkBFRPiESZkoJGmmDsVN2lekG3Zo8lSaEjBr80nC5TLBidqgNyl9wxunXivJ8OHRSj2Ro3vEvmVTtqb00gXaVlvAG');
        		
	
        
        $userID = session('loggedUserId');
        $items = \Cart::session($userID)->getContent();

        if($items->count() == 0){
            return redirect('/');
        }else{

            $total = 0;
    
            $loggedUserInfo  =  User::where('id', '=', $userID)->first();
    
            foreach($items as $item) {
                $total = $total + (intval($item->quantity) * $item->price);
            }
            $amount = (int) $total;
    
            $payment_intent = \Stripe\PaymentIntent::create([
                'description' => 'Stripe Test Payment',
                'amount' => $total,
                'currency' => 'eur',
                'description' => 'Payment' . $loggedUserInfo->username,
                'payment_method_types' => ['card'],
            ]);
            $intent = $payment_intent->client_secret;
            
            $data = [
                'loggedUserInfo' => $loggedUserInfo,
                'items' => $items,
                'total' => $total,
                'intent' => $intent
            ];
            return view('chechout', $data);
        }


    }

    public function afterPayment(){

        $userID = session('loggedUserId');
        $items = \Cart::session($userID)->getContent();

        $user  =  User::where('id', '=', $userID)->first();

        $qrCode = Qrcode::where('id', '=', $user->qrcode_id)->first();

        $qrCode->isVerified = true;
        $qrCode->save();

        foreach($items as $item) {

            $command = new Command;

            $command->user_id = $userID;
            $command->product = $item->name;
            $command->offers_id = $item->associatedModel->id;
            $command->price = $item->price;
            $command->quantity = $item->quantity;

            $command->save();

            \Cart::session($userID)->remove($item->id);
        }
        return view('payment');

    }
}
