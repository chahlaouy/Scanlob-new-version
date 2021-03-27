@extends('layouts.master')

@section('title')
    Mes pokes
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
                <a href="{{route('user.qr-code')}}" class="py-2 flex items-center hover:text-indigo-600">
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
                <a href="{{route('user.notifications')}}" class="py-2 flex items-center text-indigo-600">
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
    <div class="bg-gray-800 bg-opacity-50 rounded-3xl p-1 md:p-12 w-full">
        @if (isset($pokes) && count($pokes)>0)
        <div class="w-full">
            @foreach ($pokes as $poke)           
                <div class="mt-5 w-full">
                    <div class="p-4 bg-white shadow-2xl flex rounded-2xl w-full">
                        <div class="flex mr-8 w-32">
                            <img src="{{asset('assets/images/profile.png')}}" class="w-32 rounded-2xl object-cover shadow-2xl" alt=""> 
                        </div>
                        <div class="w-full">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-2xl text-gray-800">
                                        {{$poke->username}}
                                    </h1>
                                    <span class="text-sm block text-gray-600">Date:</span>
                                    <span class="text-xs bg-green-400 p-1 my-1 rounded-2xl text-center text-green-800">{{$poke->created_at}}</span>
                                    
                                </div>
                                
                                
                            </div>
                            <hr class="my-4">
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>     
        @else
            <h1 class="text-gray-100 text-4xl">Vous n'avez pas des pokes</h1>
        @endif
    </div>
     
</section>
@endisset
@endsection