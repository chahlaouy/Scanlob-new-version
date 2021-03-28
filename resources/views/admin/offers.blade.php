@extends('layouts.master')

@section('title')
    Gestion des offres
@endsection

@section('content')
@isset($loggedUserInfo)
<section class="container mx-auto bg-profile flex justify-between">
    <div class="w-96 text-gray-600 text-sm" style="background: #e7eeed;">
        @include('admin.navbar')
    </div>  
    <div class="bg-gray-800 bg-opacity-50 rounded-3xl p-12 w-full">
        <div class="flex">
            <div class="flex-1 p-8">
                <div class="bg-indigo-600 rounded-2xl shadow-2xl p-12 text-center text-gray-100">
                    <a href="{{route('admin.add-offer')}}" class="p-12" >
                        Ajouter des offres
                    </a>
                </div>
            </div>
            <div class="flex-1 p-8">
                <div class="bg-indigo-600 rounded-2xl shadow-2xl p-12 text-center text-gray-100">
                    <a href="{{route('admin.offers-List')}}" class="p-12">
                        Gestion des Anciens offres
                    </a>
                </div>
            </div>
        </div>
    </div>
     
</section>
@endisset
@endsection