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
        @include('admin.navbar')
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
                        @if (!$command->isValidated)    
                            <button class="py-2 px-8 bg-gray-300 shadow-2xl rounded mt-3">
                                <a href="/aymen/validate-command/{{$command->id}}">
                                    Valider Commande
                                </a>
                            </button>
                        @endif
                    </div>

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
            
        @else
            <h1 class="text-gray-700 text-4xl">Sorry No Cart is empty</h1>
        @endif
    </div>
     
</section>
@endisset
@endsection
@endsection