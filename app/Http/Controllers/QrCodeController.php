<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Qrcode;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;


class QrCodeController extends Controller
{
    function index(){
        
        $data   =   [
            'loggedUserInfo'  =>  Admin::where('id', '=', session('loggedUserId'))->first(),
        ];

        return view('admin.qr-code', $data);
    }
    function list(){
        $qrCodes = DB::table('qrcodes')->get();
        
        $data   =   [
            'loggedUserInfo'  =>  Admin::where('id', '=', session('loggedUserId'))->first(),
            'qrCodes'         =>  $qrCodes,
        ];
        return view('admin.qr-list', $data);
    }

    function generate(){

        $qrcode = new Qrcode;
        $qrcode_string = rand(11111, 99999);

        $qrcode->qrcode_string = $qrcode_string;

        $qrcode->qrcode_url = '';
        $qrcode->verified = false;
        $qrcode->isGenerated = true;

        $status = $qrcode->save();

        if($status){

            return back()->with('success', 'Qr code Ajoutée avec succée.');

        }else{
            
            return back()->with('fail', 'Quelque chose ne va pas, veuillez réessayer plus tard.');

        }

    }

}
