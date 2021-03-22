<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Qrcode;

class UserAuthController extends Controller
{

    function login(){

        return view('auth.login');
    }

    function register(){

        return view('auth.register');
    }
    function qrCode(){

        return view('auth.qr-code');
    }
    function verifyCode(Request $request){

        $request->validate([
            'qrcode' => 'required | max:5 | min:5'
        ]);

        $qrcode = Qrcode::where('qrcode_string', '=', $request->qrcode)->first();

        if($qrcode){
            if($qrcode->isGenerated){
                $request->session()->put('qrcode', $request->qrcode);
                return redirect('/inscription')->with('success', "Qr code Verifiée entrer vos Information pour terminer l'inscription ");
            }
        }else{
            return redirect('/inscription')->with('fail', "Qr code non Verifiée Vous pouvez vous inscrire maintenant et en obtenir un plus tard");
        }

    }
    function createUser(Request $request){
        
        //Validating request
        $request->validate([
            'username'  =>  'required',
            'email'  =>  'required | email | unique:users',
            'password'  =>  'required | min:4 | max:12',
            'confirm-password'  =>  'required | min:4 | max:12',
        ]);

        // if form validated successfully
        
        if(session()->has('qrcode')){
            $qrcode = Qrcode::where('qrcode_string', '=', session('qrcode'))->first();
            session()->pull('qrcode');
            $qrcode->verified = true;
        }else{

            $qrcode = new Qrcode;
            $qrcode_string = rand(11111, 99999);
            $qrcode->qrcode_string = $qrcode_string;
            $qrcode->qrcode_url = '';
            $qrcode->isGenerated = false;
            $qrcode->isVerified = false;
        }
        
        

        $query2 = $qrcode->save();

        //Creating a blank user
        $user = new User;
        
        // Fill the Use Data
        $user->username     =       $request->username;
        $user->email        =       $request->email;
        $user->password     =       Hash::make($request->password);
        $user->qrcode_id     =       $qrcode->id;

        // Save The User
        $query = $user->save();

        

        // Using query builder
        // $query = DB::table('users')
        //             ->insert([
        //                 'username'  =>  $request->username,
        //                 'email'  =>  $request->email,
        //                 'password'  =>  Hash::make($request-password),
        //             ]);
        // Check the nothing goes wrong

        if ($query && $query2){

            $request->session()->put('loggedUserId', $user->id);
            // return back()->with('success', 'Vous avez bien été enregistré');
            return redirect('/dashboard');
        } else {
            return back()->with('fail', "désolé, quelque chose s'est mal passé, essayez plus tard");
        }
    }

    function check(Request $request){

        // Validating request
        $request->validate([
            'email'     =>      'required | email',
            'password'  =>      'required | min:4 | max:12'
        ]);

        // if form is validated successfully

        // get user from db

        $user   =   User::where('email', '=', $request->email)->first();
        
        if($user){

            //if password user matches password request
            if (Hash::check($request->password, $user->password)){

                // redirect to user dashboard

                $request->session()->put('loggedUserId', $user->id);
                return redirect('dashboard');

            }else{
                return back()->with('fail', 'Invalid Password');
            }

        }else{
            return back()->with('fail', 'no account found for this email');
        }
    }

    function logout(){

        if(session()->has('loggedUserId')){
            session()->pull('loggedUserId');
            return redirect('connexion');
        }
    }


    
}
