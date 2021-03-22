<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\Admin;

class AdminAuthController extends Controller
{
    
    function login(){
        return view('auth.admin-login');
    }


    function check(Request $request){

        // Validating request
        $request->validate([
            'email'     =>      'required | email',
            'password'  =>      'required | min:4 | max:12'
        ]);

        // if form is validated successfully

        // get admin from db

        $admin   =   Admin::where('email', '=', $request->email)->first();
        
        if($admin){

            //if password admin matches password request
            if (Hash::check($request->password, $admin->password)){

                // redirect to admin dashboard

                $request->session()->put('loggedUserId', $admin->id);
                return redirect('admin/dashboard');

            }else{
                return back()->with('fail', 'Mot de passe erroné');
            }

        }else{
            return back()->with('fail', 'aucun compte trouvé pour cet e-mail');
        }
    }

    function logout(){

        if(session()->has('loggedUserId')){
            session()->pull('loggedUserId');
            return redirect('admin/connexion');
        }
    }
}
