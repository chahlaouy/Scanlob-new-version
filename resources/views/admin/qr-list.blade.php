@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
@isset($loggedUserInfo)
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
                <a href="{{route('admin.offers')}}" class="py-2 flex items-center hover:text-indigo-600">
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
            
        <div class="bg-indigo-600 rounded-2xl shadow-2xl py-4 text-center text-gray-100">
            <h1 class="text-center text-4xl">Listes des Qr Code</h1>
        </div>
        <div class="bg-white rounded-2xl shadow-2xl p-6 text-center text-gray-700 mt-8 text-left">
            <table class="min-w-max w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Qr Code</th>
                        <th class="py-3 px-6 text-left">Verifie</th>
                        <th class="py-3 px-6 text-left">Utilisateur</th>
                        <th class="py-3 px-6 text-center">Assign</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    @foreach ($qrCodes as $qr)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                               {{$qr->id}} 
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                {{$qr->qrcode_string}}
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                @if ($qr->verified)
                                    Verifiée
                                @else
                                    Non Verifiée
                                @endif
                            </td>
                            @if (false)
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                {{$qr->user}}
                            </td>
                            @else
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                Non Assignée
                            </td>
                            @endif
                            <td class="py-3 px-6 text-center whitespace-nowrap">
                                <a href="#">
                                    <ion-icon name="person-add" class="text-xl text-indigo-500"></ion-icon>
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