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
    <section class=" w-full bg-indigo-600 flex items-center justify-center p-1 md:p-8">
        <div class="w-full bg-white rounded-2xl shadow-2xl p-2 md:p-12 leading-loose tracking-wide text-gray-700 bg-about">
            <div class="flex items-center">
                <div class="flex-1">
                    <h1 class="text-7xl text-gray-800">Apropos Scanlob</h1>
                    <p class="text-sm tracking-wide leading-loose text-gray-600 my-2 max-w-lg">Scanlob est créee la Société GLOBLEU par SASU (ci-après dénommée GLOBLEU ou la
                        Société) au capital de 1000 euros, immatriculée au RCS de Versailles ,
                        ayant son siège 2 Rue Eugène Pottier,
                    </p>
                    <p class="text-sm tracking-wide leading-loose text-gray-600 my-2 max-w-lg">78190, Trappes, propose sur son site internet un
                        service de communication entre deux Utilisateurs (un Client et un Répondant), ainsi que desCodes (généralement fixés sur des supports) permettant d'anonymiser les Utilisateurs. 
                        condition.
                    </p>
                    <p class="text-sm tracking-wide leading-loose text-gray-600 my-2 max-w-lg">La
                        vente de ces objets et services sur le siteScanlib.com est régie par les présentes conditions
                        générales de vente (ci-après dénommées les CGV), à l’exclusion de tout autre document ou
                        condition.
                    </p>
                </div>
                <div class="flex-1"></div>

            </div>
            <div class="md:flex md:items-center md:justify-around mt-2 md:mt-32">

                <div class="flex items-center justify-center bg-gray-200 rounded-xl shadow-2xl text-center w-64 p-4 my-4 md:my-0">

                    <div class="">
                        <ion-icon name="car" class="text-5xl text-purple-600"></ion-icon>
                        <p class="text-sm tracking-wide leading-loose text-gray-600 my-3">
                            Livraison en 24H  
                            Profiter de notre offre de livraison rapide
                        </p>
                    </div>


                </div>
                <div class="flex items-center justify-center bg-gray-200 rounded-xl shadow-2xl text-center w-64 p-4 my-4 md:my-0">

                    <div class="">
                        <ion-icon name="bag-handle-outline" class="text-5xl text-purple-600"></ion-icon>
                        <p class="text-sm tracking-wide leading-loose text-gray-600 my-3">
                            Payement en ligne
                            Plateforme sécurisée et garantie 
                        </p>
                    </div>


                </div>
                <div class="flex items-center justify-center bg-gray-200 rounded-xl shadow-2xl text-center w-64 p-4 my-4 md:my-0">

                    <div class="">
                        <ion-icon name="browsers-outline" class="text-5xl text-purple-600"></ion-icon>
                        <p class="text-sm tracking-wide leading-loose text-gray-600 my-3">
                            Services et vente de poduits 
                            Tous les services liés à notre produit sont totalement gratuits
                        </p>
                    </div>


                </div>

            </div>
        </div>
    </section>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>