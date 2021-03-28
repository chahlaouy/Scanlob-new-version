<ul>
    <li>
        <a href="{{route('admin.dashboard')}}" class="py-2 flex items-center hover:text-indigo-600">
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