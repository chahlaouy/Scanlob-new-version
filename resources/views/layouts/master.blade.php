<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <title>
        @yield('title')
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos offres</title>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
</head>
<body class="mx-4 md:mx-0">


	<!-- 
    *****************************
    *       Section Cart        *
    *****************************
	-->

    {{-- <div class="fixed bottom-0 right-0 p-5">
        <div class="flex items-center justify-center w-16 h-16 rounded-full bg-indigo-600 text-gray-100">
            <div class="text-center">
                <ion-icon name="cart" class="text-3xl"></ion-icon>
                <p class="text-xs">Panier</p>
            </div>
        </div>
    </div> --}}

	<!-- 
    *****************************
    *       Section Header      *
    *****************************
	-->
    <div x-data="{ open: false }" class="md:hidden container ">
        <div class="flex items-center justify-between py-4">
            <h1 class="text-2xl">
                SCANLOB
            </h1>
            <button @click="open = true"><ion-icon name="grid" class="text-3xl text-gray-700"></ion-icon></button>
        </div>
    
        <ul
            x-show="open"
            @click.away="open = false"
        >
            <li class="py-3">
                <a href="{{route('home')}}">
                    Acceuil
                </a>
            </li>
            <li class="py-3">
                <a href="{{route('products')}}">
                    Nos Offres
                </a>
            </li>
            <li class="py-2">
                <a href="{{route('about')}}">
                    A propos
                </a>
            </li>
            <li class="py-2">
                <a href="{{route('contact')}}">
                    Contact
                </a>
            </li>
            <div class="w-full text-gray-600 text-sm py-2" style="background: #e7eeed;">
                <div class="relative text-sm flex items-center w-full">
                    <form action="{{route('search')}}" method="get" class="w-full">
                        @csrf
                        <input type="text" class="px-4 py-2 bg-gray-200 w-full rounded border border-gray-300" placeholder="Entrer qr-code" name="qrcode">
                        <button type="submit" class="absolute -ml-12 py-2 h-full bg-indigo-600 text-white px-4 rounded-r border border-indigo-600">
                            <ion-icon name="search" class="text-sm"></ion-icon>
                        </button>
                        {{-- <span class="text-red-400">
                            @error('qrcode')
                                {{$message}}
                            @enderror
                        </span> --}}
                    </form>
                 </div>
             </div>
            <div class="text-center">
                @if (isset($loggedUserInfo))
                    <div class="flex items-center">

                        <div class="relative mr-2">
                            <button class="bg-indigo-600 px-4 py-2 text-gray-100 rounded-lg shadow-xl text-center focus:outline-none flex items-center" onclick="myFunction()" class="dropbtn-menu-profile">
                                <ion-icon name="person" class="text-xl mr-2"></ion-icon>
                                <div class="flex items-center">
                                    <p class="text-sm mr-2">
                                        <a href="{{route('user.dashboard')}}">
                                            {{ $loggedUserInfo->username }}</p>
                                        </a>
                                    <ion-icon name="chevron-down-circle-outline" class="text-lg"></ion-icon>
                                </div>
                            </button>
                            {{-- <div class="hidden absolute right-0 w-64 bg-white shadow text-left rounded text-gray-700">
                                <ul>
                                    <li class="px-4 py-2  hover:bg-gray-300 flex items-center">
                                        <ion-icon name="apps" class="mr-1"></ion-icon>
                                        <a href="{{route('user.dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="px-4 py-2  hover:bg-gray-300 flex items-center">
                                        <ion-icon name="log-out" class="mr-1"></ion-icon>
                                        <a href="{{route('user.logout')}}">D??connexion</a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                        @if ($loggedUserInfo->username != 'Aymen.sai')
                            
                            
                            <a href="{{route('cart.items')}}" class="bg-gray-100 px-4 py-2 rounded-lg shadow-xl text-gray-700 text-center block flex items-center">
                                <ion-icon name="cart" class="text-xl mr-2"></ion-icon>
                                <div class="block text-sm">
                                    <span>Panier</span>
                                    <span class="p-1 bg-yellow-400 text-xs rounded-2xl">{{Session::get('cartItems') | 0 }}</span>
                                </div>
                            </a>
                        @endif
                    </div>
                @else   
                    <a href="{{route('qr-code')}}" class="bg-indigo-600 px-4 py-2 text-gray-100 rounded-lg shadow-xl block">
                        <ion-icon name="qr-code-outline" class="text-3xl"></ion-icon>
                        <span class="block text-sm">premier connexion</span>
                    </a>
                    <a href="{{route('user.login')}}" class="bg-gray-100 px-4 py-2 rounded-lg shadow-xl text-gray-700 text-center block">
                        <ion-icon name="person-outline" class="text-3xl"></ion-icon>
                        <span class="block text-sm">Inscription/Connexion</span>
                    </a>
                @endif
                
                
            </div>
        </ul>
    </div>
    <header class="hidden md:block container mx-auto">
        <nav class="flex items-center justify-between py-4">
            <h1 class="text-2xl">
                SCANLOB
            </h1>
            <ul class="flex items-center">
                <li class="px-3">
                    <a href="{{route('home')}}">
                        Acceuil
                    </a>
                </li>
                <li class="px-3">
                    <a href="{{route('products')}}">
                        Nos Offres
                    </a>
                </li>
                <li class="px-3">
                    <a href="{{route('about')}}">
                        A propos
                    </a>
                </li>
                <li class="px-3">
                    <a href="{{route('contact')}}">
                        Contact
                    </a>
                </li>
                {{-- <li class="px-3">
                    <a href="actualit??s">
                        Actualit??s
                    </a>
                </li> --}}
            </ul>
            <div class="w-96 text-gray-600 text-sm px-4" style="background: #e7eeed;">
                <div class="relative text-sm flex items-center">
                    <form action="{{route('search')}}" method="get">
                        @csrf
                        <input type="text" class="px-4 py-2 bg-gray-200 w-full rounded border border-gray-300" placeholder="Entrer qr-code" name="qrcode">
                        <button type="submit" class="absolute -ml-12 py-2 h-full bg-indigo-600 text-white px-4 rounded-r border border-indigo-600">
                            <ion-icon name="search" class="text-sm"></ion-icon>
                        </button>
                        {{-- <span class="text-red-400">
                            @error('qrcode')
                                {{$message}}
                            @enderror
                        </span> --}}
                    </form>
                 </div>
             </div>
            <div class="flex text-center">
                @if (isset($loggedUserInfo))
                    <div class="flex items-center">

                        <div class="relative mr-2">
                            <button class="bg-indigo-600 px-4 py-2 text-gray-100 rounded-lg shadow-xl text-center focus:outline-none flex items-center" onclick="myFunction()" class="dropbtn-menu-profile">
                                <ion-icon name="person" class="text-xl mr-2"></ion-icon>
                                <div class="flex items-center">
                                    <p class="text-sm mr-2">{{ $loggedUserInfo->username }}</p>
                                    <ion-icon name="chevron-down-circle-outline" class="text-lg"></ion-icon>
                                </div>
                            </button>
                            <div class="hidden absolute right-0 w-64 bg-white shadow text-left rounded text-gray-700" id="dropdown-menu-profile">
                                <ul>
                                    <li class="px-4 py-2  hover:bg-gray-300 flex items-center">
                                        <ion-icon name="apps" class="mr-1"></ion-icon>
                                        @if ($loggedUserInfo->username != 'Aymen.sai')
                                            
                                            <a href="{{route('user.dashboard')}}">Dashboard</a>
                                        @else
                                            
                                            <a href="{{route('admin.dashboard')}}">Dashboard</a>
                                        @endif
                                    </li>
                                    <li class="px-4 py-2  hover:bg-gray-300 flex items-center">
                                        <ion-icon name="log-out" class="mr-1"></ion-icon>
                                        <a href="{{route('user.logout')}}">D??connexion</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if ($loggedUserInfo->username != 'Aymen.sai')
                            
                            
                            <a href="{{route('cart.items')}}" class="bg-gray-100 px-4 py-2 rounded-lg shadow-xl text-gray-700 text-center block flex items-center">
                                <ion-icon name="cart" class="text-xl mr-2"></ion-icon>
                                <div class="block text-sm">
                                    <span>Panier</span>
                                    <span class="p-1 bg-yellow-400 text-xs rounded-2xl">{{Session::get('cartItems') | 0 }}</span>
                                </div>
                            </a>
                        @endif
                        
                    </div>
                @else   
                    <a href="{{route('qr-code')}}" class="bg-indigo-600 mr-2 px-4 py-2 text-gray-100 rounded-lg shadow-xl block">
                        <ion-icon name="qr-code-outline" class="text-3xl"></ion-icon>
                        <span class="block text-sm">premier connexion</span>
                    </a>
                    <a href="{{route('user.login')}}" class="bg-gray-100 px-4 py-2 rounded-lg shadow-xl text-gray-700 text-center block">
                        <ion-icon name="person-outline" class="text-3xl"></ion-icon>
                        <span class="block text-sm">Inscription/Connexion</span>
                    </a>
                @endif
                
                
            </div>
        </nav>
    </header>

	@yield('content')
	<!-- 
		*****************************
		*       Section footer      *
		*****************************
	-->
    <footer class="h-auto">
        <div
            class="bg-indigo-100 mt-24 mx-12 lg:mx-56 -mb-8 lg:-mb-16 py-4 lg:py-16 text-gray-100 font-bold px-8 lg:px-24 relative z-40 shadow-2xl rounded-xl">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-sm lg:text-4xl text-purple-500">Pr??t ?? commencer ?!</h1>
                    <h1 class="text-sm lg:text-4xl text-blue-500"> Parle-nous aujourd'hui</h1>
                </div>
                <button class="text-xs bg-indigo-600 text-white rounded-lg px-4 py-2 w-24 lg:w-48">
                    <a href="/nos-offres">
                        Get Started
                    </a>
                </button>
            </div>
        </div>
        <div class="bg-indigo-600 text-gray-200 p-8 md:px-24 xl:px-48 relative z-30">
    
            <div class="text-center mt-10 sm:px-12 md:px-24 xl:px-48">
                <h1 class="text-2xl pt-10">SCANLOB</h1>
                <div class="flex items-center justify-around py-5">
                    <div class="h-8 w-8 border border-gray-200 rounded-full flex justify-center items-center">
                        <ion-icon name="logo-github" class="text-gray-100"></ion-icon>
                    </div>
                    <div class="h-8 w-8 border border-gray-200 rounded-full flex justify-center items-center">
                        <ion-icon name="logo-facebook" class="text-gray-100"></ion-icon>
                    </div>
                    <div class="h-8 w-8 border border-gray-200 rounded-full flex justify-center items-center">
                        <ion-icon name="logo-youtube" class="text-gray-100"></ion-icon>
                    </div>
                    <div class="h-8 w-8 border border-gray-200 rounded-full flex justify-center items-center">
                        <ion-icon name="logo-linkedin" class="text-gray-100"></ion-icon>
                    </div>
                    <div class="h-8 w-8 border border-gray-200 rounded-full flex justify-center items-center">
                        <ion-icon name="logo-pinterest" class="text-gray-100"></ion-icon>
                    </div>
                    <div class="h-8 w-8 border border-gray-200 rounded-full flex justify-center items-center">
                        <ion-icon name="logo-behance" class="text-gray-100"></ion-icon>
                    </div>
                </div>
                <p class="text-sm">?? 2021 SCANLOB, all rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>