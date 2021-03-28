@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
@isset($loggedUserInfo)
<section class="container mx-auto  flex justify-between">
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
            
        <div class="bg-indigo-600 rounded-2xl shadow-2xl py-4 text-center text-gray-100">
            <h1 class="text-center text-4xl">Listes des Qr Code</h1>
        </div>

        <div class="flex items-center">
            <h1 class="bg-gray-900 rounded-2xl shadow-2xl py-2 mt-8 px-4 text-center text-gray-100 text-center text-xl">Qr Code Vérifié</h1>
        </div>
        <div class="bg-white rounded-2xl shadow-2xl p-6 text-center text-gray-700 mt-8 text-left">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Qr Code</th>
                        <th class="py-3 px-6 text-left">Verifie</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    @foreach ($qrCodes as $qr)
                        @if ($qr->isVerified)
                        
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                {{$qr->id}} 
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                {{$qr->qrcode_string}}
                            </td>
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                Verifiée
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            

        </div>
        <div class="flex items-center">
            <h1 class="bg-gray-900 rounded-2xl shadow-2xl py-2 mt-8 px-4 text-center text-gray-100 text-center text-xl">Qr Code Non Vérifie</h1>
        </div>
        <div class="bg-white rounded-2xl shadow-2xl p-6 text-center text-gray-700 mt-8 text-left">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Qr Code</th>
                        <th class="py-3 px-6 text-left">Verifie</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    @foreach ($qrCodes as $qr)
                        @if ((!$qr->isVerified && !$qr->isGenerated))
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    {{$qr->id}} 
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    {{$qr->qrcode_string}}
                                </td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    @if ($qr->isVerified)
                                        Verifiée
                                    @else
                                        Non Verifiée
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            

        </div>
        <div x-data="{ open: false }">

            <div class="flex items-center"  @click="open = !open">
                <h1 class="bg-gray-900 rounded-2xl shadow-2xl py-2 mt-8 px-4 text-center text-gray-100 text-center text-xl">Qr Code Génere</h1>
            </div>
            <div class="bg-white rounded-2xl shadow-2xl p-6 text-center text-gray-700 mt-8 text-left" x-show="open">
                <table class="w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">ID</th>
                            <th class="py-3 px-6 text-left">Qr Code</th>
                            <th class="py-3 px-6 text-left">Verifie</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-xs font-light">
                        @foreach ($qrCodes as $qr)
                            @if (($qr->isGenerated && !$qr->isVerified))
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        {{$qr->id}} 
                                    </td>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        {{$qr->qrcode_string}}
                                    </td>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        @if ($qr->isVerified)
                                            Verifiée
                                        @else
                                            Non Verifiée
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                
    
            </div>
        </div>
    </div>
     
</section>
@endisset
@endsection