<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;
use App\Models\User;

class ReviewController extends Controller
{
    function createReview(Request $request, $id){
    
        $request->validate([
            'title' =>  'required',
            'body'  => 'required'
        ]);
        
        $review = new Review;

        $review->title = $request->title;
        $review->body = $request->body;
        $review->user_id = $id;
        if(session('loggedUserId')){
            $loggedUserInfo  =  User::where('id', '=', session('loggedUserId'))->first();
            $review->author = $loggedUserInfo->username;
        }else{
            $review->author = 'Inconnu';
        }

        $status = $review->save();

        if($status){

            return back()->with('success','Avis Enregistrer avev succee.');

        }else{ 
            return back()->with('fail','Quelque chose ne va pas, veuillez réessayer plus tard.');
        }
    }
}
