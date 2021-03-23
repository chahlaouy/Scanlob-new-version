@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
@isset($loggedUserInfo)
<section class="container mx-auto bg-profile md:flex md:justify-between">
    <div class="w-96 text-gray-600 text-sm" style="background: #e7eeed;">
        <ul>
            <li>
                <a href="{{route('user.dashboard')}}" class="py-2 flex items-center text-indigo-600">
                    <ion-icon name="apps" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('user.profile')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="person" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Profile</span>
                </a>
            </li>
            
            <li>
                <a href="{{route('user.commands')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Mes Commandes</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{route('user.cards')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="id-card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Mes Cartes</span>
                </a>
            </li> --}}
            <li>
                <a href="{{route('user.qr-code')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="id-card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Mon Qr-Code</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.reviews')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="star" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Mes Avis</span>
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
    <div class="bg-gray-800 bg-opacity-5 rounded-3xl p-1 md:p-12 w-full">
        
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="tracking-wide leading-loose capitalize tex-3xl">Profile</h1>
                    <span class="text-xs">Lorem, ipsum dolor sit amet</span>
                </div>
                <div class="flex items-center justify-around">
                    <div
                        class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                        <ion-icon name="logo-github" class="text-gray-800"></ion-icon>
                    </div>
                    <div
                        class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                        <ion-icon name="logo-facebook" class="text-indigo-600"></ion-icon>
                    </div>
                    <div
                        class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                        <ion-icon name="logo-youtube" class="text-red-400"></ion-icon>
                    </div>
                    <div
                        class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                        <ion-icon name="logo-linkedin" class="text-blue-500"></ion-icon>
                    </div>
                    <div
                        class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                        <ion-icon name="logo-pinterest" class="text-red-400"></ion-icon>
                    </div>
                    <div
                        class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                        <ion-icon name="logo-behance" class="text-blue-400"></ion-icon>
                    </div>
                </div>
            </div>
            <hr class="my-4">
            <div class="flex items-center justify-around">
                <div class=" text-center p-4 text-sm">
                    <!-- <ion-icon name="person" class="text-xl  text-indigo-600"></ion-icon> -->
                    <span class="block">Profile</span>
                    <span class="text-gray-500">
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star"></ion-icon>
                        <ion-icon name="star-half"></ion-icon>
                    </span>
                </div>
                <div class="p-4 text-center text-sm">
                    <!-- <ion-icon name="heart" class="text-red-400 text-xl"></ion-icon> -->
                    <span class="block">Poke</span>
                    <span class="text-gray-500">155 personne</span>
                </div>

                <div class="text-center p-4 text-sm">
                    <span class="block">Pin</span>
                    <span class="text-gray-500">155 personne</span>
                </div>
            </div>

        </div>

       
    </div>
     
</section>
@endisset
@endsection