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
                <a href="{{ route('admin.logout')}}" class="py-2 flex items-center hover:text-indigo-600">
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
                        <button class="py-2 px-8 bg-gray-300 shadow-2xl rounded mt-3">
                            <a href="/admin/validate-command/{{$command->id}}">
                                Valider Commande
                            </a>
                        </button>
                    </div>
                    {{-- <div class="flex mr-8 w-32">
                        <img src="{{asset('assets/images/profile.png')}}" class="w-32 rounded-2xl object-cover shadow-2xl" alt=""> 
                    </div>
                    <div class="w-full">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-2xl text-gray-800">
                                    {{$command->product}}
                                </h1>
                                <span class="text-sm block text-gray-600">Quantité:</span>
                                <span class="text-xl block text-indigo-700">{{$command->quantity}}</span>
                            </div>
                            <div class="text-3xl">
                                {{$command->price}}€
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="flex items-center justify-end">
                            <button class="bg-red-400 text-gray-100 shadow-2xl rounded px-4 py-2">
                                <a href="/admin/command/{{$command->id}}">Voir commande</a>  
                            </button>
                        </div>
                    </div> --}}
                </div>
                <div class="p-4 bg-white shadow-2xl rounded-2xl w-full mt-8 text-gray-800">
                    <h1 class="text-xl capitalize">Billing Information</h1>
                    <h2 class="my-4 text-lg">Nom et Prénom:</h2>
                    <h2 class="py-4 text-gray-700 bg-gray-200 px-4 border boder-gray-500 rounded shadow">{{$user->username}}</h2>
                    <h2 class="my-4 text-lg">Télephone</h2>
                    <h2 class="py-4 text-gray-700 bg-gray-200 px-4 border boder-gray-500 rounded shadow">{{$user->phone}}</h2>
                    <h2 class="my-4 text-lg">Addresse</h2>
                    <h2 class="py-4 text-gray-700 bg-gray-200 px-4 border boder-gray-500 rounded shadow">Addresse</h2>
                    
                </div>
            </div>
        </div>
        {{-- <div class="flex-1 px-6">
            
            <div class="bg-white shadow-2xl rounded-2xl mt-5 p-8">
                <h1 class="text-3xl mb-16">Liste Des Produits</h1>
                @foreach ($command as $command)
                    <div class="flex command-center justify-between my-2">
                        <div class="text-lg text-gray-700">
                            {{$command->name}}
                        </div>
                        <div class="font-bold text-lg">
                            {{$command->quantity * $command->price}}€
                            
                        </div>
                    </div>
                    <hr>
                @endforeach
                <div class="flex command-center justify-between mt-16">
                    <div class="text-3xl">
                        Total
                    </div>
                    <div>
                        {{$total}}€
                        
                    </div>
                </div>
                <div class="flex command-center justify-end mt-16">
                    <div class="bg-indigo-600 text-gray-100 px-4 py-2 rounded shadow-2xl flex command-center ">
                        <ion-icon name="cart" class="text-xl mr-2"></ion-icon>
                        <a href="/checkout">Acheter Maintenant</a>
                    </div>
                </div>
            </div>
        </div> --}}
            
        @else
            <h1 class="text-gray-700 text-4xl">Sorry No Cart is empty</h1>
        @endif
    </div>
     
</section>
@endisset
@endsection
@endsection