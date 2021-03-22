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
        <div class="bg-white shadow-2xl rounded-xl w-96 h-96 flex items-center justify-center p-8">
            <form action="{{route ('admin.check')}}" method="POST">
                @csrf
                <div>
                    <h1 class="text-center capitalize tracking-wide leading-loose text-2xl text-gray-800">Connexion</h1>
                    <div>
                        @if (Session::get('fail'))
                            <div class="w-full px-4 py-2 my-4 bg-red-400 rounded text-white">
                                {{Session::get('fail')}}
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
                    <p class="text-sm text-uppercase leading-loose tracking-wider text-indigo-600">
                        <a href="inscription">
                            Creér une nouvelle compte
                        </a>
                    </p>
                </div>
            </form>
            
        </div>
    </section>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>