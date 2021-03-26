<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

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
            <form action="{{route ('user.update-password')}}" method="POST">
                @csrf
                <div>
                    <h1 class="text-center capitalize tracking-wide leading-loose text-sm text-gray-800">Réinitialiser votre mot de passe</h1>
                    <div>
                        @if (Session::get('error'))
                            <div class="w-full px-4 py-2 my-4 bg-red-400 rounded text-white">
                                {{Session::get('error')}}
                            </div>
                        @endif
                    </div>
                    <input type="text" class=" hidden w-full px-4 py-2 my-4 bg-red-200 rounded outline-white" placeholder="Email" name="token" value="{{$token}}">
                    <span class="text-red-400">
                        @error('token')
                            {{$message}}
                        @enderror
                    </span>
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
                    <button class="w-full px-4 py-2 my-4 bg-indigo-600 rounded text-gray-100 focus:outline-none">Réinitialiser</button>
                </div>
            </form>
            
        </div>
    </section>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>