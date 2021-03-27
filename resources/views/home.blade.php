@extends('layouts.master')

@section('title')
    Acceuil | SCANLOB
@endsection
@section('content')
<!-- 
    *****************************
    *       Section Header      *
    *****************************
-->
<div class="flex mt-8 md:mt-28 container mx-auto">
            
    <div class="flex-1">
        {{-- <h2 class="text-sm uppercase text-indigo-600 tracking-wider leading-loose">bienvenue scanlob</h2> --}}
        <h1 class="text-7xl text-gray-800  capitalize">Développer Votre Quotidien</h1>
        <p class="max-w-lg mt-12 text-gray-500 tracking-wide leading-loose">
            Avec SCANLOB, 
            <span class="text-indigo-600">
                VOUS ÊTES UNIQUE
            </span>
             <br>
            Vous pouvez partager votre expérience dès le 1er jour 
            Commander maintenant ! </p>
        <button class="mt-12 bg-indigo-600 px-4 py-2 rounded-lg text-gray-100">
            <a href="{{route('about')}}">
                En savoir plus
            </a>
        </button>
        <div class="flex items-center text-red-400 mt-24 text-xl">
            <ion-icon name="logo-facebook" class="mr-4"></ion-icon>
            <ion-icon name="logo-instagram" class="mr-4"></ion-icon>
            <ion-icon name="logo-youtube"></ion-icon>
        </div>
    </div>
    <div class="hidden md:flex-1 md:flex md:items-center md:justify-center">
        <img src="./assets/images/illustration-1.png" class="w-full" alt="">
    </div>
</div>

<!-- 
    *****************************
    *       Section services    *
    *****************************
-->
<section class="container mx-auto">
    <h1 class="text-5xl text-gray-800 my-8 md:my-24 text-center">Nos Service</h1>
    <div class="md:flex md:items-center md:justify-center text-gray-500">
        <div>
            <div class="flex items-center justify-center">
                <img src="./assets/images/icons_lamp.png" class="w-32" alt="">
            </div>
            <div class="text-center p-4">
                <h1 class="text-xl text-gray-700">Innovation </h1>
                <p class="text-sm">
                    un produit qui éprouve votre détermination.
                </p>
            </div>
        </div>
        <div>
            <div class="flex items-center justify-center">
                <img src="./assets/images/icons_chat.png" class="w-32" alt="">
            </div>
            <div class="text-center p-4">
                <h1 class="text-xl text-gray-700">Unicité</h1>
                <p class="text-sm">
                    Rassurez vous que vos clients vont conserver votre magnifique carte visite.
                </p>
            </div>
        </div>
        <div>
            <div class="flex items-center justify-center">
                <img src="./assets/images/icons_config.png" class="w-32" alt="">
            </div>
            <div class="text-center p-4">
                <h1 class="text-xl text-gray-700">Efficacité</h1>
                <p class="text-sm">
                    Partager votre expérience dés le prémier jour
                </p>
            </div>
        </div>
    </div>
</section>
<!-- 
    *****************************
    *       Mobile Section      *
    *****************************
-->
<section class="bg-purple-600 mt-16">
    <div class="container mx-auto py-8 md:py-12 md:flex md:justify-between">
        <div class="gflex">
            <h1 class="text-4xl border-l-4 border-gray-100 text-gray-100 pl-4 max-w-md">
                Télécharger Notre App SCANLOB
            </h1>
            <p class="text-lg text-gray-200 w-full tracking-wide leading-loose mt-4">
                Votre meilleure solution pour développer votre quotidien
            </p>
        </div>
        <div class="flex">
            <div class="flex items-center justify-center">
                <img src="./assets/images/google_btn.webp" class="w-32" alt="">
            </div>
            <div class="flex items-center justify-center">
                <img src="./assets/images/apple_btn.png" class="w-32" alt="">
            </div>
        </div>
    </div>
</section>

<section class="hidden md:block">
    <div class="flex -mt-40">
        <div class="flex-1"></div>
        <div class="flex-1 flex items-center">
            <img src="./assets/images/phone.png" class="max-w-xl" alt="">
        </div>
    </div>
</section>
<!-- 
    *****************************
    *       Mobile features     *
    *****************************
-->
<section class="container mx-auto">
    <h1 class="text-5xl text-gray-800 my-24 text-center">Nos feature</h1>
    <div class="md:flex md:items-center md:justify-around text-center">

        <div class="p-4 bg-white shadow-2xl rounded-2xl h-52 w-full md:w-52 my-8 md:my-0">
            <ion-icon name="diamond" class="text-6xl text-indigo-600"></ion-icon>
            <h1 class="text-xl text-indigo-600">Accessoires</h1>
            <p class="text-sm text-gray-500 tracking-wide leading-loose">
                des accessoires qui permet de simplifier votre vie.
            </p>
        </div>
        
        <div class="p-4 bg-indigo-600 shadow-2xl rounded-2xl h-52 md:w-52 my-8 md:my-0">
            <ion-icon name="notifications" class="text-6xl text-gray-100"></ion-icon>
            <h1 class="text-xl text-gray-100">Notifications</h1>
            <p class="text-sm text-indigo-200 tracking-wide leading-loose">
                Recevoir des notifications à temps réel 
            </p>
        </div>

        <div class="p-4 bg-white shadow-2xl rounded-2xl h-52 md:w-52 my-8 md:my-0">
            <ion-icon name="git-network" class="text-6xl text-indigo-600"></ion-icon>
            <h1 class="text-xl text-indigo-600">diversité</h1>
            <p class="text-sm text-gray-500 tracking-wide leading-loose">
                Des cartes visites uniques et personnaliser
            </p>
        </div>

    </div>
</section>
<!-- 
    *****************************
    *       Offre Section       *
    *****************************
-->
<section class="container mx-auto">
    <h1 class="text-5xl text-gray-800 my-8 md:my-24 text-center">Nos derniére offre </h1>

    <section class="md:grid md:grid-cols-3 md:gap-8 md:px-12">

        @foreach ($offers as $offer) 
            <div id="card" class="overflow-hidden rounded-lg">
                <div class="w-full relative z-0">
                    <div class="bg-gray-900 bg-opacity-50 w-full h-full absolute z-10 rounded-lg overflow-hidden">
                        <div
                            class="flex justify-center items-center py-4 text-gray-600 text-sm bg-opacity-75 text-center rounded-t-lg">
                            <div class="flex-1 flex items-center justify-center">
                                <div
                                    class="w-12 h-12 flex items-center justify-center rounded-full bg-indigo-500 rounded-icon rounded-icon-1">
                                    <ion-icon name="desktop-outline" class="text-xl text-gray-100"></ion-icon>
                                </div>
                            </div>
                            <div class="flex-1 flex items-center justify-center">
                                <div
                                    class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-100 rounded-icon rounded-icon-2">
                                    <ion-icon name="stats-chart-outline" class="text-xl"></ion-icon>
                                </div>
                            </div>
    
                            <div class="flex-1 flex items-center justify-center">
                                <div
                                    class="w-12 h-12 flex items-center justify-center rounded-full bg-gray-100 rounded-icon rounded-icon-3">
                                    <ion-icon name="list-outline" class="text-xl"></ion-icon>
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 w-full z-0">
                            <div class="flex items-center text-xs text-gray-100 ">
                                <div class="px-1 py-2 ">
                                    <ion-icon name="cloud-download" class="pr-1"></ion-icon>
                                    <span class="text-xs">122</span>
                                </div>
                                <div class="px-1 py-2">
                                    <ion-icon name="star" class="pr-1"></ion-icon>
                                    <span class="text-xs">4/5</span>
                                </div>
    
                            </div>
                        </div>
                    </div>
                    <img src="{{asset('assets/images').'/'.$offer->img_url}}" alt="" class="w-full h-96 object-cover rounded-t-lg shadow-lg" />
                </div>
                <div class="bg-white shadow-lg rounded-b-lg">
                    <div class="px-6">
                        <div class="flex justify-between items-center">
                            <div class="my-4">
                                <span class="text-xs uppercase leading-loose tracking-wide">{{$offer->tag}}</span>
                                <h1 class="text-2xl font-bold">{{$offer->title}}</h1>
                            </div>
                            <h1 class="flex items-start text-right">
                                <div class="font-bold text-xl py-3">{{$offer->price}}</div>
                                <span class="text-xs text-gray-600 pt-3">€</span>
                            </h1>
                        </div>
                        <div class="relative text-sm text-gray-500 pb-2">
                            <p>{{$offer->description}}</p>
                            <button
                                class="w-8 h-8 bg-red-400 rounded-full absolute z-0 bottom-8 right-0 outline-none">
                                <a href="/offre/{{$offer->id}}"><span class="opacity-0">go</span></a></button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

</section>
@endsection