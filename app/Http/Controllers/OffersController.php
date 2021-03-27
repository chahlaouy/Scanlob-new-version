<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Offers;
use Illuminate\Support\Facades\DB;

class OffersController extends Controller
{
    function offers(){
        $data   =   [
            'loggedUserInfo'  =>  Admin::where('id', '=', session('loggedUserId'))->first()
        ];
        return view('admin.offers', $data);
    }
    function add(){
        $data   =   [
            'loggedUserInfo'  =>  Admin::where('id', '=', session('loggedUserId'))->first()
        ];
        return view('admin.add-offer', $data);
    }
    function create(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'tag' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();  

        $request->image->move(public_path('assets/images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */
        
        $offer = new Offers;

        $offer->img_url = $imageName;
        $offer->title = $request->title;
        $offer->tag = $request->tag;
        $offer->price = $request->price;
        $offer->category = $request->category;
        $offer->description = $request->description;
        $status = $offer->save();

        if($status){

            return back()->with('success', 'Offre Ajoutée avec succée.');
        
        }else{
            
            return back()->with('fail', 'Quelque chose ne va pas, veuillez réessayer plus tard.');
        }
    }

    function offerList(){

        $offers = DB::table('offers')->get();
        $data   =   [
            'loggedUserInfo'  =>  Admin::where('id', '=', session('loggedUserId'))->first(),
            'offers'=> $offers
        ];
        
        return view('admin.offers-list', $data);
    }
    function editOffer($id){

        $offer = Offers::where('id', '=', $id)->first();
        $data   =   [
            'loggedUserInfo'  =>  Admin::where('id', '=', session('loggedUserId'))->first(),
            'offer'=> $offer
        ];
        
        return view('admin.edit-offer', $data);
    }
    function update(Request $request){

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'tag' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();  

        $request->image->move(public_path('assets/images'), $imageName);
        
        $offer = Offers::where('id', '=', $request->id)->first();

        $offer->img_url = $imageName;
        $offer->title = $request->title;
        $offer->tag = $request->tag;
        $offer->price = $request->price;
        $offer->category = $request->category;
        $offer->description = $request->description;
        $status = $offer->save();

        $data   =   [
            'loggedUserInfo'  =>  Admin::where('id', '=', session('loggedUserId'))->first(),
            'offer'=> $offer
        ];

        if($status){

            return back()->with('success', 'Offre Ajoutée avec succée.')->with('loggedUserInfo', $data[0]);
        
        }else{
            
            return back()->with('fail', 'Quelque chose ne va pas, veuillez réessayer plus tard.')->with('loggedUserInfo', $data[0]);
        }
        
    }
    function confirm($id){

        $offer = Offers::where('id', '=', $id)->first();
        $data   =   [
            'loggedUserInfo'  =>  Admin::where('id', '=', session('loggedUserId'))->first(),
            'offer'=> $offer
        ];
        
        return view('admin.confirm-deleting', $data);
    }
    function delete($id){

        $offer = Offers::where('id', '=', $id)->first();
        $offers = DB::table('offers')->get();
        $status = $offer->delete();
        $data   =   [
            'loggedUserInfo'  =>  Admin::where('id', '=', session('loggedUserId'))->first(),
            'offers'=> $offer
        ];
        
        return redirect('/aymen/liste-des-offres');
    }
}
