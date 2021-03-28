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
                        <button class="bg-red-400 text-gray-100 py-2 px-4 rounded-lg">
                            <a href="/aymen/delete-message/{{$message->id}}">Supprimer le message</a>
                        </button>
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