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
        @if (isset($commands))
        <div class="w-full">
            @foreach ($commands as $command)           
                <div class="mt-5 w-full">
                    <div class="p-4 bg-white shadow-2xl flex rounded-2xl w-full">
                        <div class="flex mr-8 w-32">
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
                                    <a href="/aymen/command/{{$command->id}}">Voir commande</a>  
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
            
        @else
            <h1 class="text-gray-700 text-4xl">Sorry No Cart is empty</h1>
        @endif
    </div>
     
</section>
@endisset
@endsection