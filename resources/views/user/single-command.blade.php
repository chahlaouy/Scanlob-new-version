@extends('layouts.master')

@section('content')
@extends('layouts.master')

@section('title')
    Mes Commandes
@endsection

@section('content')
@isset($loggedUserInfo)
<section class="container mx-auto bg-profile flex justify-between">
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
                <a href="{{route('user.qr-code')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="id-card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Mon Qr-Code</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.reviews')}}" class="py-2 flex items-center text-indigo-600">
                    <ion-icon name="mail-unread" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Mes Avis</span>
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
                    <span class="capitalize tracking-wider leading-loose">Déconnexion</span>
                </a>
            </li>
        </ul>
    </div>  
    <div class="bg-gray-800 bg-opacity-50 rounded-3xl p-12 w-full">
        @if (isset($command))
        <div class="w-full">           
            <div class="mt-5 w-full">
                <div class="p-4 bg-white shadow-2xl flex items-center rounded-2xl w-full">
                    <div class="flex items-center h-96">
                        <img src="{{asset('assets/images/') . '/' . $offer->img_url}}" class="w-96" alt="">
                    </div>
                    <div class="ml-24">
                        <h1 class="text-xl capitalize">{{ $offer->title }}</h1>
                        <p class="tracking-wide leading-loose text-gray-700 my-8">
                            {{ $offer->description }}
                        </p>
                        <h1 class="text-sm">Quantité</h1>
                        <span>{{ $command->quantity }}</span>
                        <h1 class="text-sm mt-3">Prix Unitaire</h1>
                        <span class="block">{{ $command->price }}</span>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
        @else
            <h1 class="text-gray-700 text-4xl">Vous n'avez pas des commandes en cours</h1>
        @endif
    </div>
     
</section>
@endisset
@endsection
@endsection