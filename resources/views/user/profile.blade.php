@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')
@isset($loggedUserInfo)
<section class="container mx-auto bg-profile flex justify-between">
    <div class="w-96 text-gray-600 text-sm" style="background: #e7eeed;">
        <ul>
            <li>
                <a href="{{route('user.dashboard')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="apps" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('user.profile')}}" class="py-2 flex items-center text-indigo-600">
                    <ion-icon name="person" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Profile</span>
                </a>
            </li>
            
            <li>
                <a href="{{route('user.commands')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Mes Commandes</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{route('user.cards')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="id-card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Mes Cartes</span>
                </a>
            </li> --}}
            <li>
                <a href="{{route('user.qr-code')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="id-card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Mon Qr-Code</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.reviews')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="star" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Mes Avis</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.logout')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="log-out" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Déconnexion</span>
                </a>
            </li>
        </ul>
    </div>  
    <div class="bg-gray-800 bg-opacity-5 rounded-3xl p-12 w-full rounded">

        @if (Session::get('success'))
            <div class="bg-green-300 w-full py-4 text-center rounded my-4">
                {{Session::get('success')}}
            </div>
        @endif
        @if (Session::get('fail'))
            <div class="bg-red-300 w-full py-4 text-center rounded my-4">
                {{Session::get('fail')}}
            </div>
        @endif
        <form action="{{route('user.addInfo')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex items-center justify-end my-4">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-gray-100 focus:outline-none rounded-xl">Enregistrer Modification</button>
            </div>
            <div class="flex">
                <div class="bg-white rounded-2xl shadow-2xl w-96 mr-6 h-auto">
                    <div class="flex p-4 relative z-0">
                        <img src="{{asset('assets/images/profile.png')}}" class="h-96 w-full rounded-2xl object-cover" alt="">
                        {{-- <div class="absolute bottom-0 right-0 z-10 w-24 h-24 rounded-full bg-indigo-600 flex items-center justify-center">
                            <div class="text-6xl font-bold text-gray-100">
                                <input type="file" id="img" name="img" accept="image/*">
                            </div>
                        </div> --}}
                        <div class="absolute bottom-0 right-0 z-10 w-24 h-24 rounded-full bg-indigo-600 flex items-center justify-center">

                            <input type="file" class="custom-file-input" name="image" accept="file/*">
                        </div>
                    </div>
                    <span class="text-red-400">
                        @error('image')
                            {{$message}}
                        @enderror
                    </span>
                    <div class="p-4 text-gray-700">
                        <h1 class="tracking-wide leading-loose capitalize">{{$loggedUserInfo->username}}</h1>
                        <span class="text-xs">{{$loggedUserInfo->email}}</span>
                        <hr class="my-4">
                        <span>le résumé</span>
                        <p class="text-sm tracking-wide leading-loose text-gray-700 my-4">
                            veuillez entrer le résumé ici
                        </p>
                        <label class="block">
                            <textarea name="summary" class="form-textarea mt-1 block w-full border-2 border-gray-300 rounded" rows="10" placeholder="en 60 mots maximum exprimer votre resumée."></textarea>
                        </label>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="bg-white rounded-2xl shadow-2xl p-8">
                        <h1 class="tracking-wide leading-loose capitalize tex-3xl">Personal Information</h1>
                        <span class="text-xs">Veuillez entrer vos information personel</span>
                        <hr>
                        <label class="block mt-4">
                            <span class="text-gray-700">Télephone</span>
                            <input class="form-input mt-1 block w-full" placeholder="+33 458 458 522" name="phone">
                          </label>
                          <span class="text-red-400">
                            @error('phone')
                                {{$message}}
                            @enderror
                            </span>
                          <div class="mt-4">
                            <span class="text-gray-700">Sexe</span>
                            <div class="mt-2">
                                <label class="inline-flex items-center">
                                    <input type="radio" class="form-radio border border-gray-400" name="gender" value="homme">
                                    <span class="ml-2">Homme</span>
                                </label>
                                <label class="inline-flex items-center ml-6">
                                    <input type="radio" class="form-radio border border-gray-400" name="gender" value="femme">
                                    <span class="ml-2">Femme</span>
                                </label>
                            </div>
                            <span class="text-red-400">
                                @error('gender')
                                    {{$message}}
                                @enderror
                            </span>
                          </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-2xl p-8 mt-8">
                        <h1 class="tracking-wide leading-loose capitalize tex-3xl">Addresse</h1>
                        <span class="text-xs">Veuillez Votre addresse</span>
                        <hr class="mb-4">
                        <span class="text-red-400">
                            @error('address')
                                {{$message}}
                            @enderror
                        </span>
                        <input
                        name="address"
                        id="pac-input"
                        class="controls py-2 px-4 border border-indigo-600 w-full rounded"
                        type="text"
                        placeholder="Entrer Votre addresse"
                        />
                        <div id="map" class="w-full h-96"></div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-2xl p-8 mt-8">
                        <h1 class="tracking-wide leading-loose capitalize tex-3xl">Education</h1>
                        <span class="text-xs">Veuillez entre date et niveau</span>
                        <hr>
                        <span class="text-red-400">
                            @error('addmore.*.year')
                                {{$message}}
                            @enderror
                        </span>
                        <span class="text-red-400">
                            @error('addmore.*.level')
                                {{$message}}
                            @enderror
                        </span>
                        <ul id="list-education">
                            <li>
                                <label class="block mt-4">
                                    <span class="text-gray-700">L'année</span>
                                    <select class="form-select my-4 block w-full py-2 border-2 border-gray-300 rounded focus:outline-indigo-600" name="addmore[0][year]">
                                        @for ($i = 1990; $i < 2022; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </label>
                                <label class="block mt-4">
                                    <span class="text-gray-700">Niveau</span>
                                    <input type="text" name="addmore[0][level]" class="form-input my-4 block w-full border-2 border-gray-300 rounded focus:outline-indigo-600" placeholder="Exemple Mastére en génie logiciél">
                                </label>
                            </li>
                        </ul>
                        <div class="flex items-center justify-end mt-4">
                            <div class="bg-gray-200 text-indigo-600 px-4 py-2 rounded-xl focus:outline-none cursor-pointer" id="add-education">Ajouter</div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-2xl p-8 mt-8">
                        <h1 class="tracking-wide leading-loose capitalize tex-3xl">Intéret</h1>
                        <span class="text-xs">Veuillez entrer vos intéret</span>
                        <hr>
                        <span class="text-red-400">
                            @error('interet.*')
                                {{$message}}
                            @enderror
                        </span>
                        <ul id="list-interet">
                            <li>
                                <label class="block">
                                    <input name="interet[0]" class="form-input block w-full border-2 border-gray-300 my-4 rounded focus:outline-indigo-600" placeholder="Intéret">
                                </label>
                            </li>
                        </ul>
                        <div class="flex items-center justify-end mt-4">
                            <div class="bg-gray-200 text-indigo-600 px-4 py-2 rounded-xl focus:outline-none cursor-pointer" id="add-interet">Ajouter</div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-2xl p-8 mt-8">
                        <h1 class="tracking-wide leading-loose capitalize tex-3xl">Compétences</h1>
                        <span class="text-xs">Veuillez entrer vos compétences</span>
                        <hr>
                        <span class="text-red-400">
                            @error('skills.*')
                                {{$message}}
                            @enderror
                        </span>
                        <ul id="list-competence">
                            <li>
                                <label class="block">
                                    <input name="skills[0]" class="form-input block w-full border-2 border-gray-300 my-4 rounded focus:outline-indigo-600" placeholder="compétence">
                                </label>
                            </li>
                        </ul>
                        <div class="flex items-center justify-end mt-4">
                            <div class="bg-gray-200 text-indigo-600 px-4 py-2 rounded-xl focus:outline-none cursor-pointer" id="add-competence">Ajouter</div>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-2xl p-8 mt-8">
                        <h1 class="tracking-wide leading-loose capitalize tex-3xl">Langues</h1>
                        <span class="text-xs">Veuillez entrer vos Langues</span>
                        <hr>
                        <span class="text-red-400">
                            @error('language.*')
                                {{$message}}
                            @enderror
                        </span>
                        <ul id="list-language">
                            <li>
                                <label class="block">
                                    <input name="language[0]" class="form-input block w-full border-2 border-gray-300 my-4 rounded focus:outline-indigo-600" placeholder="langue">
                                </label>
                            </li>
                        </ul>
                        <div class="flex items-center justify-end mt-4">
                            <div class="bg-gray-200 text-indigo-600 px-4 py-2 rounded-xl focus:outline-none cursor-pointer" id="add-language">Ajouter</div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
     
</section>
@endisset

@endsection