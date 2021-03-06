<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/app.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</head>
<body>
    <!-- 
    *****************************
    *       Login Page          *
    *****************************
    -->
    <section class="flex items-center justify-center h-screen w-full text-gray-600">
        <div class="bg-white shadow-2xl rounded-xl w-96 flex items-center justify-center p-8">
            <form action="{{route ('user.check')}}" method="POST">
                @csrf
                <div>
                    <h1 class="text-center capitalize tracking-wide leading-loose text-2xl text-gray-800">Connexion</h1>
                    <div>
                        @if (Session::get('fail'))
                            <div class="w-full px-4 py-2 my-4 bg-red-400 rounded text-white">
                                {{Session::get('fail')}}
                            </div>
                        @endif
                        @if (Session::get('message'))
                            <div class="w-full px-4 py-2 my-4 bg-green-400 rounded text-white">
                                {{Session::get('message')}}
                            </div>
                        @endif
                    </div>
                    <input type="email" class="w-full px-4 py-2 my-4 bg-red-200 rounded outline-white" placeholder="Email" name="email" value="{{ old('email') }}">
                    <span class="text-red-400">
                        @error('email')
                            {{$message}}
                        @enderror 
                    </span>
                    <input type="password" class="w-full px-4 py-2 my-4 bg-red-200 rounded outline-white" placeholder="Mot de passe" name="password">
                    <span class="text-red-400">
                        @error('password')
                            {{$message}}
                        @enderror
                    </span>
                    <button class="w-full px-4 py-2 my-4 bg-indigo-600 rounded text-gray-100 focus:outline-none">Connexion</button>
                    <div class="text-xs text-uppercase leading-loose tracking-wider text-indigo-600">
                        <a href="inscription" class="block my-3">
                            Cre??r une nouvelle compte
                        </a>
                        <a class="block my-3" href="{{route('user.get-email')}}">R??initialiser le mot de passe</a>
                    </div>
                    <h1 class="text-center mt-8">Ou Connectez avec</h1>
                    <div class="flex items-center justify-around mt-4">
                        <div class="flex justify-center items-center w-10 h-10 bg-indigo-600 shadow-2xl rounded-full">
                            <a href="{{ route('login.facebook') }}" class="flex justify-center items-center">
                                <ion-icon name="logo-facebook" class="text-3xl text-gray-100"></ion-icon>
                            </a>
                        </div>
                        <div class="flex justify-center items-center w-10 h-10 bg-red-500 shadow-2xl rounded-full">
                            <a href="{{ route('login.google') }}" class="flex justify-center items-center">
                                <ion-icon name="logo-google" class="text-3xl text-gray-100"></ion-icon>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </section>
    <script src="./assets/js/app.js"></script>
</body>
</html>