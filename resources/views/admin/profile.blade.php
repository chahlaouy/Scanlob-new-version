@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')
@isset($loggedUserInfo)
<section class="container mx-auto bg-profile flex justify-between">
    <div class="w-96 text-gray-600 text-sm" style="background: #e7eeed;">
        @include('admin.navbar')
    </div>  
    <div class="bg-gray-800 bg-opacity-5 rounded-3xl p-12 w-full">
        <div class="flex">
            <div class="bg-white rounded-2xl shadow-2xl w-96 mr-6">
                <div class="flex p-4 relative z-0">
                    <img src="{{asset('assets/images/profile.png')}}" class="h-96 w-full rounded-2xl object-cover" alt="">
                    {{-- <div class="absolute bottom-0 right-0 z-10 w-24 h-24 rounded-full bg-indigo-600 flex items-center justify-center">
                        <div class="text-6xl font-bold text-gray-100">
                            <input type="file" id="img" name="img" accept="image/*">
                        </div>
                    </div> --}}
                    <div class="absolute bottom-0 right-0 z-10 w-24 h-24 rounded-full bg-indigo-600 flex items-center justify-center">

                        <input type="file" class="custom-file-input" name="img" accept="image/*">
                    </div>
                </div>
                <div class="p-4 text-gray-700">
                    <h1 class="tracking-wide leading-loose capitalize"> dhiflaoui siwar</h1>
                    <span class="text-xs">Lorem, ipsum dolor sit amet</span>
                    <hr class="my-4">
                    <p class="text-sm tracking-wide leading-loose text-gray-700">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellat eos animi neque, dolor,
                        excepturi facere dolorem quia cumque, delectus magni cum ut distinctio maiores. Dolorum
                        debitis neque distinctio provident beatae.
                    </p>
                </div>
            </div>
            <div class="flex-1">
                <div class="bg-white rounded-2xl shadow-2xl p-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="tracking-wide leading-loose capitalize tex-3xl">Profile</h1>
                            <span class="text-xs">Lorem, ipsum dolor sit amet</span>
                        </div>
                        <div class="flex items-center justify-around">
                            <div
                                class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                                <ion-icon name="logo-github" class="text-gray-800"></ion-icon>
                            </div>
                            <div
                                class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                                <ion-icon name="logo-facebook" class="text-indigo-600"></ion-icon>
                            </div>
                            <div
                                class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                                <ion-icon name="logo-youtube" class="text-red-400"></ion-icon>
                            </div>
                            <div
                                class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                                <ion-icon name="logo-linkedin" class="text-blue-500"></ion-icon>
                            </div>
                            <div
                                class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                                <ion-icon name="logo-pinterest" class="text-red-400"></ion-icon>
                            </div>
                            <div
                                class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                                <ion-icon name="logo-behance" class="text-blue-400"></ion-icon>
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="flex items-center justify-around">
                        <div class=" text-center p-4 text-sm">
                            <!-- <ion-icon name="person" class="text-xl  text-indigo-600"></ion-icon> -->
                            <span class="block">Profile</span>
                            <span class="text-gray-500">
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star"></ion-icon>
                                <ion-icon name="star-half"></ion-icon>
                            </span>
                        </div>
                        <div class="p-4 text-center text-sm">
                            <!-- <ion-icon name="heart" class="text-red-400 text-xl"></ion-icon> -->
                            <span class="block">Poke</span>
                            <span class="text-gray-500">155 personne</span>
                        </div>

                        <div class="text-center p-4 text-sm">
                            <span class="block">Pin</span>
                            <span class="text-gray-500">155 personne</span>
                        </div>
                    </div>
                    
                    <div class="flex">
                        <button class="px-4 py-2 bg-indigo-600 rounded-lg shadow-xl text-white mt-4 flex items-center mr-4">
                            <ion-icon name="flash-outline" class="mr-2 text-lg"></ion-icon>
                            <span>Poke</span>
                        </button>
                        <button class="px-4 py-2 bg-gray rounded-lg shadow-xl text-indigo-600 mt-4 flex items-center">
                            <ion-icon name="locate-outline" class="mr-2 text-xl"></ion-icon>
                            <span>Pin</span>
                        </button>
                    </div>

                </div>
                <div class="bg-white rounded-2xl shadow-2xl p-8 mt-8">
                    <h1 class="tracking-wide leading-loose capitalize tex-3xl">Education</h1>
                    <span class="text-xs">Lorem, ipsum dolor sit amet</span>
                    <hr>

                </div>
                <div class="bg-white rounded-2xl shadow-2xl p-8 mt-8">
                    <h1 class="tracking-wide leading-loose capitalize tex-3xl">Interet</h1>
                    <span class="text-xs">Lorem, ipsum dolor sit amet</span>
                    <hr>

                </div>
                <div class="bg-white rounded-2xl shadow-2xl p-8 mt-8">
                    <h1 class="tracking-wide leading-loose capitalize tex-3xl">skills</h1>
                    <span class="text-xs">Lorem, ipsum dolor sit amet</span>
                    <hr>

                </div>
            </div>
        </div>
    </div>
     
</section>
@endisset
@endsection