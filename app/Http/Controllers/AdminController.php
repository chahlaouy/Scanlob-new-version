<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin; 
use App\Models\User; 
use App\Models\Contact; 

class AdminController extends Controller
{
    function index(){ 


        $monthKeyValue = ['01','02','03','04','05','06', '07','08','09','10','11','12']; 

        $month = ['janvier','février','mars','avril','may','juin','juillet','aout','septembre','octobre','novembre','décembre'];

        $user = [];
        foreach ($monthKeyValue as $key => $value) {
            $user[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%m')"),$value)->count();
        }

        $loggedUserInfo  =  Admin::where('id', '=', session('loggedUserId'))->first();

        return view('admin.dashbord')->with('month',json_encode($month,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK))->with('loggedUserInfo', $loggedUserInfo);
    }

    function profile(){
        $data   =   [
            'loggedUserInfo'  =>  Admin::where('id', '=', session('loggedUserId'))->first()
        ];
        return view('admin.profile', $data);
    }

    function message(){

        // $messages = Contact::all();
        $data = [

            'loggedUserInfo'  =>  Admin::where('id', '=', session('loggedUserId'))->first()
        ];

        return view('admin.inbox', $data);
    }
    function messageLue(){

        $messages = Contact::where('isViewed', '=', true)->get();
        $data = [

            'messages' => $messages,
            'loggedUserInfo'  =>  Admin::where('id', '=', session('loggedUserId'))->first()
        ];

        return view('admin.viewed-inbox', $data);
    }
    function messageNonLue(){

        $messages = Contact::where('isViewed', '=', false)->get();
        $data = [

            'messages' => $messages,
            'loggedUserInfo'  =>  Admin::where('id', '=', session('loggedUserId'))->first()
        ];


        return view('admin.unviewed-inbox', $data);
    }
    function getMessage($id){

        $message = Contact::where('id', '=', $id)->first();
        $data = [

            'message' => $message,
            'loggedUserInfo'  =>  Admin::where('id', '=', session('loggedUserId'))->first()
        ];


        return view('admin.single-message', $data);
    }
    function validateMessage($id){

        $message = Contact::where('id', '=', $id)->first();
        $message->isViewed = true;
        $message->save();

        return redirect('/aymen/messages-non-lue');
    }
    function destroyMessage($id){

        $message = Contact::where('id', '=', $id)->first();
        $message->delete();

        return redirect('/aymen/messages-non-lue');
    }
}
