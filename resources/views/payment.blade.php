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
    <title>Checkout page</title>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</head>
<body>

    <header class="w-full h-36 bg-indigo-600 flex items-center justify-center">
        <h1 class="text-4xl text-green-400">Merci Pour votre Confiance</h1>
    </header>
    <section class="max-w-6xl mx-auto text-gray-700 bg-white shadow-2xl rounded-2xl p-8 mt-4 text-center">
        <div class="capitalize">
            <a href="/">
                Acceuil
            </a>
        </div>
        <div class="capitalize">
            <a href="/dashboard">
                dashboard
            </a>
        </div>

    </section>

<script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
