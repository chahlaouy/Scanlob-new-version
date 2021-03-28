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
                <a href="{{route('admin.dashboard')}}" class="py-2 flex items-center text-indigo-600">
                    <ion-icon name="apps" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.qr-code')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="qr-code" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Gestion Qr-code</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.commands')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Gestion Commandes</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.offers')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="id-card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Gestion offre</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.message')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="mail" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Boite de récéption</span>
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
        @if (isset($message))
            <div class="p-4 bg-white shadow-2xl rounded-2xl w-full text-gray-700">
                <h1 class="text-4xl"> {{$message->username}} </h1>
                <span class="block text-sm my-2"> {{$message->phone}} </span>
                <span class="block text-sm my-2"> {{$message->email}} </span>
                <p class="text-sm my-8 tracking-wider leading-loose"> {{$message->message}} </p>
                <div class="mt-8 flex items-center justify-end">

                    @if (!$message->isViewed)
                        
                        <button class="bg-indigo-600 text-gray-100 py-2 px-4 rounded-lg">
                            <a href="/aymen/message/{{$message->id}}">Marquer comme Lue</a>
                        </button>
                    @endif
                </div>
            </div>
            
        @else
            <h1 class="text-gray-700 text-4xl">Ilya une erreur sil vous plas essayer plus tard</h1>
        @endif
    </div>
     
</section>
@endisset
@endsection
@endsection