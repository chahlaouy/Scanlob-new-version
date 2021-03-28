@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
@isset($loggedUserInfo)
<section class="container mx-auto bg-profile flex justify-between">
    <div class="w-96 text-gray-600 text-sm" style="background: #e7eeed;">
        <ul>
            <li>
                <a href="{{route('admin.dashboard')}}" class="py-2 flex items-center text-indigo-600">
                    <ion-icon name="apps" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.qr-code')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="qr-code" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Gestion Qr-code</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.commands')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Gestion Commandes</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.offers')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="id-card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Gestion offre</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.message')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="mail" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Boite de récéption</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.logout')}}" class="py-2 flex items-center hover:text-indigo-600">
                    <ion-icon name="log-out" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                    <span class="capitalize tracking-wider leading-loose">Déconnexion</span>
                </a>
            </li>
        </ul>
    </div>  
    <div class="bg-gray-800 bg-opacity-50 rounded-3xl p-8 w-full">
        <div class="flex">
            <div class="p-2 text-center">
                <div class="bg-white rounded-2xl shadow-2xl w-64 h-full px-2 py-8">
                    <div class="text-2xl capitalize leading-loose tracking-wide">
                        nombre total d'utilisateurs
                    </div>
                    <div class="text-4xl capitalize leading-loose tracking-wide text-indigo-600">
                        255
                    </div>
                </div>
            </div>
            <div class="flex-1 p-2">
                <div class="bg-white rounded-2xl shadow-2xl">
                    <canvas id="canvas_users" height="250" width="600"></canvas>
                </div>
            </div>
        </div>
        <div class="flex">
            <div class="flex-1 p-2">
                <div class="bg-white rounded-2xl shadow-2xl">
                    <canvas id="canvas_offers" height="250" width="600"></canvas>
                </div>
            </div>
            <div class="p-2 text-center">
                <div class="bg-white rounded-2xl shadow-2xl h-full w-64 px-2 py-8">
                    <div class="text-2xl capitalize leading-loose tracking-wide">
                        nombre total d'offres
                    </div>
                    <div class="text-4xl capitalize leading-loose tracking-wide text-indigo-600">
                        12
                    </div>
                </div>
            </div>
        </div>
    </div>
     
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var month = <?php echo $month; ?>;

    var user = <?php echo $user; ?>;
    var lineChartData = {
        labels: month,
        datasets: [{
            label: 'utilisateur',
            backgroundColor: "pink",
            data: user
        }]
    };

    var offer = ['14', '12', '0', '12', '45', '47','14', '12', '0', '12', '45', '47']
    var barChartData = {
        labels: month,
        datasets: [{
            label: 'offres',
            backgroundColor: "blue",
            data: offer
        }]
    };

    window.onload = function() {

        // Chart Users

        var ctx_users = document.getElementById("canvas_users").getContext("2d");
        window.myLine = new Chart(ctx_users, {
            type: 'line',
            data: lineChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: "Membre mensuelle de l'utilisateur"
                }
            }
        });

        // Chart Offers
        var ctx_offers = document.getElementById("canvas_offers").getContext("2d");
        window.myBar = new Chart(ctx_offers, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: "Nombre mensuelle de l'offres"
                }
            }
        });
    };
</script>
@endisset
@endsection