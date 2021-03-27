@extends('layouts.master')

@section('title')
    Confirmation-Suppression 
@endsection

@section('content')
<section class="container mx-auto bg-profile flex justify-between">
    <div class="w-96 text-gray-600 text-sm" style="background: #e7eeed;">
        <ul>
            <li>
                <a href="{{route('admin.dashboard')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="apps" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.qr-code')}}" class="py-2 flex items-center text-indigo-600">
                    <ion-icon name="qr-code" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Gestion Qr-code</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.offers')}}" class="py-2 flex items-center text-indigo-600">
                    <ion-icon name="id-card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Gestion offre</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.commands')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Gestion Commandes</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.logout')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="log-out" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Déconnexion</span>
                </a>
            </li>
        </ul>
    </div>  
    <div class="bg-gray-800 bg-opacity-50 rounded-3xl p-12 w-full">
            
        
        <div class="p-6 flex items-center justify-center bg-gray-300 rounded-2xl shadow-2xl">
            <div class="my-12">
                <div id="card" class="overflow-hidden rounded-lg w-96">
                    <div class="w-full relative z-0">
                        <div class="bg-gray-900 bg-opacity-50 w-full h-full absolute z-10 rounded-lg overflow-hidden">
                            <div
                                class="flex justify-center items-center py-4 text-gray-600 text-sm bg-opacity-75 text-center rounded-t-lg">
                                <div class="flex-1 flex items-center justify-center">
                                    <div
                                        class="w-12 h-12 flex items-center justify-center rounded-full bg-indigo-500 rounded-icon rounded-icon-1">
                                        <ion-icon name="desktop-outline" class="text-xl text-gray-100"></ion-icon>
                                    </div>
                                </div>
                                <div class="flex-1 flex items-center justify-center">
                                    <div
                                        class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-100 rounded-icon rounded-icon-2">
                                        <ion-icon name="stats-chart-outline" class="text-xl"></ion-icon>
                                    </div>
                                </div>
        
                                <div class="flex-1 flex items-center justify-center">
                                    <div
                                        class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-100 rounded-icon rounded-icon-3">
                                        <ion-icon name="list-outline" class="text-xl"></ion-icon>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute bottom-0 left-0 w-full z-0">
                                <div class="flex items-center text-xs text-gray-100 ">
                                    <div class="px-1 py-2 ">
                                        <ion-icon name="cloud-download" class="pr-1"></ion-icon>
                                        <span class="text-xs">122</span>
                                    </div>
                                    <div class="px-1 py-2">
                                        <ion-icon name="star" class="pr-1"></ion-icon>
                                        <span class="text-xs">4/5</span>
                                    </div>
        
                                </div>
                            </div>
                        </div>
                        <img src="{{asset('assets/images').'/'.$offer->img_url}}" alt="" class="w-96 h-96 object-cover rounded-t-lg shadow-lg" />
                    </div>
                    <div class="bg-white shadow-lg rounded-b-lg">
                        <div class="px-6">
                            <div class="flex justify-between items-center">
                                <div class="my-4">
                                    <span class="text-xs uppercase leading-loose tracking-wide">{{$offer->tag}}</span>
                                    <h1 class="text-2xl font-bold">{{$offer->title}}</h1>
                                </div>
                                <h1 class="flex items-start text-right">
                                    <div class="font-bold text-xl py-3">{{$offer->price}}</div>
                                    <span class="text-xs text-gray-600 pt-3">/euro</span>
                                </h1>
                            </div>
                            <div class="relative text-sm text-gray-500 pb-2">
                                <p>{{$offer->description}}</p>
                                <button
                                    class="w-8 h-8 bg-red-400 rounded-full absolute z-0 bottom-8 right-0 outline-none"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="/aymen/supprimer-offre/{{$offer->id}}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-400 text-gray-100 py-3 mt-8 text-center rounded">
                        Confirmer suppresssion
                    </button>
                </form>
            </div>
        </div>

    </div>
     
</section>
@endsection