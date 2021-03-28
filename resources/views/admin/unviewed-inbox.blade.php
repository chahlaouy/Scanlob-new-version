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
        @if (isset($messages) && count($messages)>0)
        <div class="w-full">
            @foreach ($messages as $message)           
                <div class="mt-5 w-full">
                    <div class="p-4 bg-white shadow-2xl flex rounded-2xl w-full">
                        <div class="flex mr-8 w-32">
                            <img src="{{asset('assets/images/profile.png')}}" class="w-32 rounded-2xl object-cover shadow-2xl" alt=""> 
                        </div>
                        <div class="w-full">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-2xl text-gray-800">
                                        {{$message->username}}
                                    </h1>
                                    <span class="text-sm block text-gray-600">Téléphone:</span>
                                    <span class="text-xl block text-indigo-700">{{$message->phone}}</span>
                                </div>
                                {{-- <div class="text-3xl">
                                    {{$command->price}}€
                                </div> --}}
                            </div>
                            <hr class="my-4">
                            <div class="flex items-center justify-end">
                                <button class="bg-indigo-600 text-gray-100 shadow-2xl rounded px-4 py-2">
                                    <a href="/aymen/single-message/{{$message->id}}">Voir Message</a>  
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
            
        @else
            <h1 class="text-gray-700 text-4xl">Vous avez aucune message</h1>
        @endif
    </div>
     
</section>
@endisset
@endsection