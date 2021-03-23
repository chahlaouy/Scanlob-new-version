@extends('layouts.master')

@section('title')
    Accessoire
@endsection

@section('content')
<!-- 
    *****************************
    *    header Section         *
    *****************************
-->
<section class="container mx-auto">

    <div class="flex items-center">
        <div class="hidden md:block md:flex-1 md:p-24">
            <div class="bg-red-400 w-full rounded-2xl flex items-center justify-center shadow-2xl">
                <img src="./assets/images/photographie.png" class="w-full" alt="">
            </div>
        </div>

        <div class="flex-1 max-w-2xl">
            <h1 class="tracking-wider leading-loose text-lg uppercase text-indigo-600">Des Accessoires</h1>
            <h1 class="text-7xl text-gray-800">
                Simplifier votre vie
            </h1>
            <p class="tracking-wide leading-loose text-sm text-gray-700 my-4">
                Des accessoires qui permet de simplifier votre vie
                Profiter de l'offre de livraison gratuite pour votre 1er commande 
                N'hésitez pas à nous contacter pour plus d'informations,
                À très bientôt !
            </p>

        </div>
    </div>
</section>
<!-- 
    *****************************
    *    body Section         *
    *****************************
-->
<section class="md:flex container mx-auto">
    <div class="w-full">
        <h1 class="md:hidden text-4xl px-2 uppercase tracking-wide leading-loose text-gray-800 my-12">nos cartes</h1>
        <section class="md:grid md:grid-cols-3 md:gap-4 md:px-12">

            @foreach ($offers as $offer) 
                <div id="card" class="overflow-hidden rounded-lg">
                    <div class="w-full relative z-0">
                        <div class="bg-gray-900 bg-opacity-50 w-full h-full absolute z-10 rounded-lg overflow-hidden">
                            {{-- <div
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
                            </div> --}}
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
                        <img src="{{asset('assets/images').'/'.$offer->img_url}}" alt="" class="w-96 h-96 object-cover rounded-t-lg shadow-lg" />
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
                                    <a href="/offre/{{$offer->id}}"><span class="opacity-0">go</span></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>

    </div>
    <aside class="w-96  px-4 text-sm" style="background: #e7eeed;">
        <h1 class="px-2 uppercase tracking-wide leading-loose text-gray-800">Catégories</h1>
        <ul class="w-full text-indigo-600 mt-6">
            <li class="py-2 px-2 rounded">
                <a href="{{route('products')}}">
                    Tous les Catégories
                </a>
            </li>
            <li class="py-2 px-2 rounded">
                <a href="{{route('visit-cards')}}">
                    Carte Visite
                </a>
                
            </li>
            <li class="py-2 px-2 bg-indigo-600 text-gray-100">
                <a href="{{route('accessoire')}}">
                    Accessoire
                </a>
                
            </li>
        </ul>
    </aside>
</section>
<!-- 
    *****************************
    *    pagination Section     *
    *****************************
-->
<section>
    <div class="flex items-center justify-center my-10">

        <div class="flex items-center">
            <div class="text-white bg-indigo-600 px-4 py-2 rounded mr-2 shadow-2xl border-gray-300 border">
                1
            </div>
            <div class="bg-white text-indigo-600 px-4 py-2 rounded mr-2 shadow-2xl border-gray-300 border">
                2
            </div>
            <div class="bg-white text-indigo-600 px-4 py-2 rounded mr-2 shadow-2xl border-gray-300 border">
                3
            </div>
            <div class="bg-white text-indigo-600 px-4 py-2 rounded shadow-2xl border-gray-300 border">
                4
            </div>
        </div>

    </div>
</section>
@endsection