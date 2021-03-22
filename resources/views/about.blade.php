<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <title>
        @yield('title')
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="">
    <title>Nos offres</title>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</head>
<body> 
    <section class="h-screen w-full bg-indigo-600 flex items-center justify-center p-8">
        <div class="w-full bg-white rounded-2xl shadow-2xl p-12 leading-loose tracking-wide text-gray-700 bg-about">
            <div class="flex items-center">
                <div class="flex-1">
                    <h1 class="text-7xl text-gray-800">Apropos Scanlob</h1>
                    <p class="text-sm tracking-wide leading-loose text-gray-600 my-8 max-w-lg">Créé en 2019, établie au Mans, est spécialisé dans le développement de produits innovants dans l’industrie automobile.</p>
                </div>
                <div class="flex-1"></div>

            </div>
            <div class="flex items-center justify-around mt-32">

                <div class="flex items-center justify-center bg-gray-200 rounded-xl shadow-2xl text-center w-64 p-4">

                    <div class="">
                        <ion-icon name="aperture-outline" class="text-5xl text-purple-600"></ion-icon>
                        <p class="text-sm tracking-wide leading-loose text-gray-600 my-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque quasi aspernatur blanditiise?
                        </p>
                    </div>


                </div>
                <div class="flex items-center justify-center bg-gray-200 rounded-xl shadow-2xl text-center w-64 p-4">

                    <div class="">
                        <ion-icon name="bag-handle-outline" class="text-5xl text-purple-600"></ion-icon>
                        <p class="text-sm tracking-wide leading-loose text-gray-600 my-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque quasi aspernatur blanditiise?
                        </p>
                    </div>


                </div>
                <div class="flex items-center justify-center bg-gray-200 rounded-xl shadow-2xl text-center w-64 p-4">

                    <div class="">
                        <ion-icon name="browsers-outline" class="text-5xl text-purple-600"></ion-icon>
                        <p class="text-sm tracking-wide leading-loose text-gray-600 my-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque quasi aspernatur blanditiise?
                        </p>
                    </div>


                </div>

            </div>
        </div>
    </section>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>