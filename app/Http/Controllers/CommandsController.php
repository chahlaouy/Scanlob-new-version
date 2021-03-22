<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\User;
use App\Models\Command;

class CommandsController extends Controller
{
    function indexUser(){
        
        $loggedUserInfo  =  User::where('id', '=', session('loggedUserId'))->first();
        $commands  =  Command::where('user_id', "=", session('loggedUserId'))->get();
        if($loggedUserInfo){
            if ($commands) {
                $data   =   [
                    'commands' => $commands,
                    'loggedUserInfo' => $loggedUserInfo
                ];
                return view('user.commands', $data);   
            }else{
    
                $data   =   [
                    'loggedUserInfo' => $loggedUserInfo
                ];
                return view('user.commands', $data);   
            }
        }else{
            return view('user.commands');   
    
        }
    }
    function indexAdmin(){
        $loggedUserInfo  =  Admin::where('id', '=', session('loggedUserId'))->first();
        $commands  =  Command::all();
        if($loggedUserInfo){
            if ($commands) {
                $data   =   [
                    'commands' => $commands,
                    'loggedUserInfo' => $loggedUserInfo
                ];
                return view('admin.commands', $data);   
            }else{

                $data   =   [
                    'loggedUserInfo' => $loggedUserInfo
                ];
                return view('admin.commands', $data);   
            }
        }else{
            return view('admin.commands');   

        }
    }
}
