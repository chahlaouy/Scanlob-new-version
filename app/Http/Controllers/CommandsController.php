<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\User;
use App\Models\Command;
use App\Models\Offers;
use App\Models\UserExtraInfo;

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

    function getCommand($id){

        $loggedUserInfo  =  Admin::where('id', '=', session('loggedUserId'))->first();
        $command  =  Command::where('id', '=', $id)->first();
        $offer = Offers::where('id', '=', $command->offers_id)->first();
        $user = User::where('id', '=', $command->user_id)->first();
        $userExtraInfo = UserExtraInfo::where('id', '=', $user->user_id)->first();

        $data = [
            'loggedUserInfo' => $loggedUserInfo,
            'command' => $command,
            'offer' => $offer,
            'user' => $user,
            'userExtraInfo' => $userExtraInfo,
        ];
        return view('admin.single-command', $data);
    }
    function getCommandUser($id){

        $loggedUserInfo  =  User::where('id', '=', session('loggedUserId'))->first();
        $command  =  Command::where('id', '=', $id)->first();
        $offer = Offers::where('id', '=', $command->offers_id)->first();

        $data = [
            'loggedUserInfo' => $loggedUserInfo,
            'command' => $command,
            'offer' => $offer,
        ];
        return view('user.single-command', $data);
    }
    function validateCommand($id){

        $command = Command::where('id', '=', $id)->first();

        $command->isValidated = true;

        $command->save();

        return redirect('/aymen/gestion-commands');
    }
    function getValidCommand(){
        

        $loggedUserInfo  =  Admin::where('id', '=', session('loggedUserId'))->first();
        $commands = Command::where('isValidated', '=', true)->get();

        $data = [
            'loggedUserInfo' => $loggedUserInfo,
            'commands' => $commands,
        ];

        return view('admin.validated-command', $data);
    }
    function getNonValidCommand(){
        

        $loggedUserInfo  =  Admin::where('id', '=', session('loggedUserId'))->first();
        $commands = Command::where('isValidated', '=', false)->get();

        $data = [
            'loggedUserInfo' => $loggedUserInfo,
            'commands' => $commands,
        ];

        return view('admin.validated-command', $data);
    }
    
}
