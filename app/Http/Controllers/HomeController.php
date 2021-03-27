<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Offers;
use App\Models\Qrcode;
use App\Models\Location;
use App\Models\Poke;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function home(Request $request){ 

        // session()->put('cartItems', 0);
        $offers = DB::table('offers')->get();

        if(session()->has('loggedUserId')){
            $user   =   User::where('id', '=', session('loggedUserId'))->first();
            $data   =   [
                'loggedUserInfo'  =>  $user,
                'offers' => $offers
                
            ];
            return view('home', $data);
        }
        return view('home', ['offers' => $offers]);
    }

    function products(){
        $offers = DB::table('offers')->get();
        if(session()->has('loggedUserId')){
            $user   =   User::where('id', '=', session('loggedUserId'))->first();
            $data   =   [
                'loggedUserInfo'  =>  $user,
                'offers'    => $offers
            ];
            return view('product-list', $data);
        }
        $data   =   [
            'offers'    => $offers
        ];
        return view('product-list', $data);
    }
    function getCart(){
        $offers = Offers::where('category', '=', 'visit-card')->get();
        if(session()->has('loggedUserId')){
            $user   =   User::where('id', '=', session('loggedUserId'))->first();
            $data   =   [
                'loggedUserInfo'  =>  $user,
                'offers'    => $offers
            ];
            return view('product-visit-card', $data);
        }
        $data   =   [
            'offers'    => $offers
        ];
        return view('product-visit-card', $data);
    }
    function getAccessoire(){
        $offers = Offers::where('category', '=', 'accessoire')->get();
        if(session()->has('loggedUserId')){
            $user   =   User::where('id', '=', session('loggedUserId'))->first();
            $data   =   [
                'loggedUserInfo'  =>  $user,
                'offers'    => $offers
            ];
            return view('product-accessoire', $data);
        }
        $data   =   [
            'offers'    => $offers
        ];
        return view('product-accessoire', $data);
    }

    function getOffer($id){
        /** get user */
        $offer = Offers::where("id", "=", $id)->first();


        /** user not empty */
        if($offer){

            /** logged user */
            if(session()->has('loggedUserId')){
                $loggeduser   =   User::where('id', '=', session('loggedUserId'))->first();
                $data = [
                    'offer' => $offer,
                    'loggedUserInfo'  =>  $loggeduser,
                ];
                return view('single-post', $data);

            }
            /** no logged user */
            else{
                $data = [
                    'offer' => $offer,
                ];
                return view('single-post', $data);
            }

        }
        /** user empty */
        else{
            return view('single-post');
        }
    }
    function search(Request $request){
        $request->validate([
            'qrcode' => 'required|max:5|min:5'
        ]);
        $qrCode = Qrcode::where('qrcode_string', '=', $request->qrcode)->first();
        if($qrCode){
            $user = User::where('qrcode_id', '=', $qrCode->id)->first();
            $data   =   [
                'user'    => $user
            ];
            if(session()->has('loggedUserId')){
                $loggeduser   =   User::where('id', '=', session('loggedUserId'))->first();
                $data   =   [
                    'loggedUserInfo'  =>  $loggeduser,
                    'user'    => $user
                ];
                return view('search', $data);
            }
            
            return view('search', $data);
        }
        return view('search');
    }

    function getProfile(Request $request, $id){

        /** get user */
        $user = User::where("id", "=", $id)->first();

        /** user not empty */
        if($user){

            /** logged user */
            if(session()->has('loggedUserId')){

                $loggeduser  =  User::where('id', '=', session('loggedUserId'))->first();
                $data = [
                    'user' => $user,
                    'loggedUserInfo'  =>  $loggeduser,
                ];
                return view('profile', $data);

            }
            /** no logged user */
            else{
                
                $lat = 46.2276;
                $lng = 2.2137;

                $data = [
                    'user' => $user,
                ];
                return view('profile', $data);
            }

        }
        /** user empty */
        else{
            return view('profile');
        }

    }

    function term(){

        return view('term');
    }
    function contact(){

        return view('contact');
    }
    function about(){

        return view('about');
    }

    function pin(Request $request){

        $location = new Location();

        $location->lat = $request->lat;
        $location->lng = $request->lng;
        $location->profile_id = $request->profileId;
        $location->user_id = $request->username;

        $location->save();

        return 'success';

    }
    function poke(Request $request){

        $poke = Poke::where('username', '=', $request->username)->first();
        if($poke){
            return "fail";
        }
        
        $poke = new Poke();

        $poke->total = $poke->total + 1;
        $poke->profile_id = $request->profileId;
        $poke->username = $request->username;

        $poke->save();

        return 'success';

    }

}
