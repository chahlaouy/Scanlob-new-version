<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin; 
use App\Models\User; 

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
}
