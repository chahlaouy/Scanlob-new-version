@extends('layouts.master')

@section('title')
    Qr code
@endsection

@section('content')
@isset($loggedUserInfo)
<section class="container mx-auto bg-profile md:flex md:justify-between">
    <div class="w-96 text-gray-600 text-sm" style="background: #e7eeed;">
        <ul>
            <li>
                <a href="{{route('user.dashboard')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="apps" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Profile</span>
                </a>
            </li>
            <li>
                <a href="{{route('user.profile')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="person" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Editeur</span>
                </a>
            </li>
            
            <li>
                <a href="{{route('user.commands')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Mes Commandes</span>
                </a>
            </li>
            <li>
                <a href="{{route('user.qr-code')}}" class="py-2 flex items-center text-indigo-600">
                    <ion-icon name="id-card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Mon Qr-Code</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.reviews')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="mail-unread" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Mes Messageries</span>
                </a>
            </li>
            <li>
                <a href="{{route('user.notifications')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="notifications" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Notifications</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.logout')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="log-out" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">D??connexion</span>
                </a>
            </li>
        </ul>
    </div>  
    <div class="bg-gray-800 bg-opacity-50 rounded-3xl md:p-12 w-full">
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
        <div class="">
            <div class="p-8">
                <div class="bg-indigo-600 rounded-2xl shadow-2xl p-12 text-center text-gray-100">
                    <a href="{{route('user.qr-code')}}" class="p-4 md:p-12" >
                        Mon Qr code
                    </a>
                </div>
            </div>
            <div class="p-8">
                <div class="bg-white rounded-2xl shadow-2xl p-12 text-center text-gray-700">

                    <div class="">
                        <ion-icon name="qr-code" class="text-8xl text-red-400"></ion-icon>
                    </div>
                    <div class="my-4">
                        <button class="bg-gray-300 py-3 px-5 shadow-lg rounded">
                            {{$qr_string}}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
     
</section>
@endisset
@endsection