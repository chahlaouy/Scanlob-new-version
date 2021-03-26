<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/app.css">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
            <div>
                <h1>Réinitialiser votre mot de passe</h1>
            </div>
            <a href="https://scanlob.com/reset-password/{{$token}}">Cliquez ici</a>.
        </div>
    </section>
    <script src="./assets/js/app.js"></script>
</body>
</html>