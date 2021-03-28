@extends('layouts.master')

@section('title')
    Gestion qr code
@endsection

@section('content')
@isset($loggedUserInfo)
<section class="container mx-auto bg-profile flex justify-between">
    <div class="w-96 text-gray-600 text-sm" style="background: #e7eeed;">
        @include('admin.navbar')
    </div>  
    <div class="bg-gray-800 bg-opacity-50 rounded-3xl p-12 w-full">
        @if (Session::get('success'))
            <div class="bg-green-300 w-full py-4 text-center rounded my-4">
                {{Session::get('success')}}
            </div>
        @endif
        @if (Session::get('fail'))
            <div class="bg-red-300 w-full py-4 text-center rounded my-4">
                {{Session::get('fail')}}
            </div>
        @endif
        <div class="flex">
            <div class="flex-1 p-8">
                <div class="bg-indigo-600 rounded-2xl shadow-2xl p-12 text-center text-gray-100">
                    <a href="{{route('admin.qr-code-generate')}}" class="p-12" >
                        Ajouter Un Qr-Code
                    </a>
                </div>
            </div>
            <div class="flex-1 p-8">
                <div class="bg-indigo-600 rounded-2xl shadow-2xl p-12 text-center text-gray-100">
                    <a href="{{route('admin.qr-code-list')}}" class="p-12">
                        Gestion des Qr-code
                    </a>
                </div>
            </div>
        </div>
    </div>
     
</section>
@endisset
@endsection