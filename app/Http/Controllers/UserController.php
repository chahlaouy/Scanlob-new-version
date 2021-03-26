<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\UserExtraInfo;

use Illuminate\Support\Facades\DB;

use App\Models\Location;

class UserController extends Controller
{
    function index(){
        $user = User::where('id', '=', session('loggedUserId'))->first();
        $locts = DB::table('locations')->where('profile_id', '=', $user->id)->get();
        
        $lat = 46.2276;
        $lng = 2.2137;
        $data   =   [
            'loggedUserInfo'  =>  User::where('id', '=', session('loggedUserId'))->first(),
            'user'  =>  $user,
            'lat' => $lat,
            'lng' => $lng,
            'locts' => $locts

        ];

        return view('user.dashbord', $data);
    }

    function profile(){

        $data   =   [
            'loggedUserInfo'  =>  User::where('id', '=', session('loggedUserId'))->first(),
        ];
        return view('user.profile', $data);
    }

    function cards(){
        $data   =   [
            'loggedUserInfo'  =>  User::where('id', '=', session('loggedUserId'))->first()
        ];
        return view('user.cards', $data);
    }
    function qrCode(){

        $qrcodes = DB::table('qrcodes')->get();

        $loggedUserInfo  =  User::where('id', '=', session('loggedUserId'))->first();
        
        foreach($qrcodes as $qr){
            if($qr->id == $loggedUserInfo->qrcode_id){
                $qr_string = $qr->qrcode_string;
            }
        }

        $data   =   [
            'loggedUserInfo'  =>  $loggedUserInfo,
            'qr_string' => $qr_string
        ];
        return view('user.qr-code', $data);
    }
    function reviews(){

        $reviews = DB::table('reviews')->get();
        $loggedUserInfo  =  User::where('id', '=', session('loggedUserId'))->first();
        if(count($reviews)>0){
            $data   =   [
                'loggedUserInfo'  =>  $loggedUserInfo,
                'reviews' => $reviews
            ];
            return view('user.reviews', $data);
        }else{
            $data   =   [
                'loggedUserInfo'  =>  $loggedUserInfo,
            ];
            return view('user.reviews', $data);
        }
        

    }

    function addUserInfo(Request $request){


        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'addmore.*.year' => 'required',
            // 'addmore.*.level' => 'required',
            // 'skills.*' => 'required',
            // 'interet.*' => 'required',
            // 'language.*' => 'required',
            // 'summary' => 'required',
            // 'phone' => 'required',
            // 'gender' => 'required',
            // 'address' => 'required'
        ]);

        /** if user is modifying the extra info */
        $userInfo = UserExtraInfo::where('user_id', '=', session('loggedUserId'))->first();
        if($userInfo){
            if($request->image){
                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('assets/images'), $imageName);
                $userInfo->img_url = $imageName;
            }

            if($request->summary){
    
                $userInfo->summary = $request->summary;
            }

            if($request->address){
    
                $userInfo->address = $request->address;
            }

            if($request->phone){
    
                $userInfo->phone = $request->phone;
            }

            if($request->gender){
    
                $userInfo->gender = $request->gender;
            }
    
            if($request->interet){
    
                $userInfo->interet = $request->interet;
            }
    
            if($request->language){
    
                $userInfo->languages = $request->language;
            }
    
            if($request->skills){
    
                $userInfo->skills = $request->skills;
            }
    
            if($request->addmore){
    
                $userInfo->education = $request->addmore;
            }
            $status = $userInfo->save();   
        }else{

            /* Store $imageName name in DATABASE from HERE */
    
            $userExtraInfo = new UserExtraInfo;
    
            if($request->image){
                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('assets/images'), $imageName);
                $userExtraInfo->img_url = $imageName;
            }else{
                $userExtraInfo->img_url = '';
            }
    
            if($request->summary){
    
                $userExtraInfo->summary = $request->summary;
            }else{
                $userExtraInfo->summary ='';
            }
    
            if($request->address){
    
                $userExtraInfo->address = $request->address;
            }else{
                $userExtraInfo->address = '';
            }
    
            if($request->phone){
    
                $userExtraInfo->phone = $request->phone;
            }else{
                $userExtraInfo->phone = '';
            }
    
            if($request->gender){
    
                $userExtraInfo->gender = $request->gender;
            }else{
                $userExtraInfo->gender = '';
            }
    
            if($request->interet){
    
                $userExtraInfo->interet = $request->interet;
            }else{
                $userExtraInfo->interet = '';
            }
    
            if($request->language){
    
                $userExtraInfo->languages = $request->language;
            }else{
                $userExtraInfo->languages = '';
            }
    
            if($request->skills){
    
                $userExtraInfo->skills = $request->skills;
            }else{
                $userExtraInfo->skills = '';
            }
    
            if($request->addmore){
    
                $userExtraInfo->education = $request->addmore;
            }else{
                $userExtraInfo->education = '';
            }
            
            $userExtraInfo->experience = '';
            $userExtraInfo->certifications = '';
    
            $userExtraInfo->user_id = session('loggedUserId');
            $status = $userExtraInfo->save();
        }

        if($status){

            return back()->with('success','Vous avez mis à jour votre profil avec succès.');

        }else{ 
            return back()->with('fail','Quelque chose ne va pas, veuillez réessayer plus tard.');
        }

    }
}
