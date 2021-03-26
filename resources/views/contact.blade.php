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
</head>
<body>
    
    <section class="h-screen w-full bg-indigo-600 flex items-center justify-center">
        <div class="max-w-2xl bg-white rounded-2xl shadow-2xl p-4 md:p-12 leading-loose tracking-wide">
            <form action="" method="post">
                @csrf
                <h1 class="uppercase text-xl text-center ">contactez-nous</h1>
                <div class="flex items-center">
                    <div class="w-full md:w-96 p-4">
                        <label class="block mt-4">
                            <div class="text-gray-700 text-left">Nom</div>
                            <input type="text" class="form-input mt-1 block w-full py-2 border-2 border-gray-300 rounded focus:outline-indigo-600 text-xs" placeholder="nom" name="username">
                        </label>
                        <span class="text-red-400">
                            @error('username')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="w-full md:w-96 p-4">
                        <label class="block mt-4">
                            <div class="text-gray-700 text-left">Prénom</div>
                            <input type="text" class="form-input mt-1 block w-full py-2 border-2 border-gray-300 rounded focus:outline-indigo-600 text-xs" placeholder="prénom" name="lastname">
                        </label>
                        <span class="text-red-400">
                            @error('lastname')
                                {{$message}}
                            @enderror
                        </span>
                    </div>
                </div>
    
                <div class="w-full p-4">
                    <label class="block mt-4">
                        <div class="text-gray-700 text-left">Email</div>
                        <input type="email" class="form-input mt-1 block w-full py-2 border-2 border-gray-300 rounded focus:outline-indigo-600 text-xs" placeholder="titre ici" name="email">
                    </label>
                    <span class="text-red-400">
                        @error('email')
                            {{$message}}
                        @enderror
                    </span>
                </div>
    
                <div class="w-full p-4">
                    <label class="block mt-4">
                        <div class="text-gray-700 text-left">Télephone</div>
                        <input type="number" class="form-input mt-1 block w-full py-2 border-2 border-gray-300 rounded focus:outline-indigo-600 text-xs" placeholder="titre ici" name="phone">
                    </label>
                    <span class="text-red-400">
                        @error('phone')
                            {{$message}}
                        @enderror
                    </span>
                </div>
    
                <div class="w-full p-4">
                    <label class="block mt-4">
                        <div class="text-gray-700 text-left">Votre Message</div>
                        <textarea type="text" class="form-input mt-1 block w-full p-2 border-2 border-gray-300 rounded focus:outline-indigo-600 text-xs" placeholder="Votre message" rows="5" name="message"></textarea>
                    </label>
                    <span class="text-red-400">
                        @error('message')
                            {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="flex items-center justify-center">
                    <button type="submit" class="bg-gray-800 px-12 py-2 rounded-2xl text-gray-100">Envoyer</button>
                </div>
            </form>

        </div>
    </section>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>