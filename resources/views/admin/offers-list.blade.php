@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
@isset($loggedUserInfo)
<section class="container mx-auto bg-profile flex justify-between">
    <div class="w-96 text-gray-600 text-sm" style="background: #e7eeed;">
        @include('admin.navbar')
    </div>  
    <div class="bg-gray-800 bg-opacity-50 rounded-3xl p-12 w-full">
            
        <div class="bg-indigo-600 rounded-2xl shadow-2xl py-4 text-center text-gray-100">
            <h1 class="text-center text-4xl">Listes des offres</h1>
        </div>
        <div class="bg-white rounded-2xl shadow-2xl p-6 text-center text-gray-700 mt-8 text-left">
            <table class="min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Title</th>
                        <th class="py-3 px-6 text-left">Tag</th>
                        <th class="py-3 px-6 text-left">Category</th>
                        <th class="py-3 px-6 text-left">Description</th>
                        <th class="py-3 px-6 text-left">Price</th>
                        <th class="py-3 px-6 text-left">Editer</th>
                        <th class="py-3 px-6 text-left">Supprimer</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    @foreach ($offers as $offer)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                               {{$offer->id}} 
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                {{$offer->title}}
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                               {{$offer->tag}} 
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                {{$offer->category}}
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                               {{$offer->description}}
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                {{$offer->price}}
                            </td>
                            <td class="py-3 px-6 text-center whitespace-nowrap">
                                <a href="/aymen/editer-offre/{{$offer->id}}">
                                    <ion-icon name="create" class="text-xl text-blue-400"></ion-icon>
                                </a>
                            </td>
                            <td class="py-3 px-6 text-center whitespace-nowrap">
                                <a href="/aymen/confirmation/{{$offer->id}}">
                                    <ion-icon name="trash" class="text-xl text-red-400"></ion-icon>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>       
        </div>
    </div>
     
</section>
@endisset
@endsection