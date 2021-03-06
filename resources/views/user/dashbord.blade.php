@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
@isset($user)
    <section class="container mx-auto bg-profile md:flex md:justify-between">
        <div class="w-96 text-gray-600 text-sm" style="background: #e7eeed;">
            <ul>
                <li>
                    <a href="{{route('user.dashboard')}}" class="py-2 flex items-center text-indigo-600">
                        <ion-icon name="apps" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                        <span class="capitalize tracking-wider leading-loose">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.profile')}}" class="py-2 flex items-center hover:text-indigo-600">
                        <ion-icon name="person" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                        <span class="capitalize tracking-wider leading-loose">Editeur</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{route('user.commands')}}" class="py-2 flex items-center hover:text-indigo-600">
                        <ion-icon name="card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                        <span class="capitalize tracking-wider leading-loose">Mes Commandes</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.qr-code')}}" class="py-2 flex items-center hover:text-indigo-600">
                        <ion-icon name="id-card" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                        <span class="capitalize tracking-wider leading-loose">Mon Qr-Code</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.reviews')}}" class="py-2 flex items-center hover:text-indigo-600">
                        <ion-icon name="mail-unread" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                        <span class="capitalize tracking-wider leading-loose">Mes Messageries</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('user.notifications')}}" class="py-2 flex items-center hover:text-indigo-600">
                        <ion-icon name="notifications" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                        <span class="capitalize tracking-wider leading-loose">Notifications</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.logout')}}" class="py-2 flex items-center hover:text-indigo-600">
                        <ion-icon name="log-out" class="text-indigo-600 mr-2 text-lg"></ion-icon>
                        <span class="capitalize tracking-wider leading-loose">D??connexion</span>
                    </a>
                </li>
            </ul>
        </div>  
        <div class="bg-gray-800 bg-opacity-5 rounded-3xl p-1 md:p-12 w-full">
            <div class="p-4 w-full">
                <div class="bg-indigo-200 w-full h-96 rounded-xl">
                    <div class="h-full w-full" id="map_profile"></div>
                </div>
            </div>
            <div class="md:flex">
                <div class="bg-white rounded-2xl shadow-2xl w-full md:w-96 md:mr-6 h-auto">
                    <div class="flex p-4">
                        @if (isset($user->userExtraInfo->img_url))
                            <img src="{{asset('assets/images/') . '/' .$user->userExtraInfo->img_url }}" class="h-96 w-full rounded-2xl object-cover" alt="">
                        @else
                            <img src="{{asset('assets/images/profile.png') }}" class="h-96 w-full rounded-2xl object-cover" alt=""> 
                        @endif
                        
                    </div>
                    <div class="p-4 text-gray-700">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h1 class="tracking-wide leading-loose capitalize">{{$user->username}}</h1>
                                <span class="text-xs block">{{$user->email}}</span>
                                @isset($user->userExtraInfo->phone)
                                    <span class="text-xs block">{{$user->userExtraInfo->phone}}</span>
                                @endisset
                                @isset($user->userExtraInfo->gender)
                                    <span class="text-xs block">{{$user->userExtraInfo->gender}}</span>
                                @endisset
                            </div>
                            <div class="flex-1">
                                <ion-icon name="qr-code" class="text-4xl text-gray-600"></ion-icon>
                            </div>
                        </div>
                        <hr class="my-4">
                        <p class="text-sm tracking-wide leading-loose text-gray-700">
                            @isset($user->userExtraInfo->summary)  
                                {{$user->userExtraInfo->summary}}
                            @endisset
                        </p>
                    </div>
                </div>
                <div class="flex-1 mt-4 md:mt-0">
                    <div class="bg-white rounded-2xl shadow-2xl p-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="tracking-wide leading-loose capitalize tex-3xl">Profile</h1>
                                <span class="text-xs">Profile</span>
                            </div>
                            <div class="flex items-center justify-around">
                                <div
                                    class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                                    <ion-icon name="logo-github" class="text-gray-800"></ion-icon>
                                </div>
                                <div
                                    class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                                    <ion-icon name="logo-facebook" class="text-indigo-600"></ion-icon>
                                </div>
                                <div
                                    class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                                    <ion-icon name="logo-youtube" class="text-red-400"></ion-icon>
                                </div>
                                <div
                                    class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                                    <ion-icon name="logo-linkedin" class="text-blue-500"></ion-icon>
                                </div>
                                <div
                                    class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                                    <ion-icon name="logo-pinterest" class="text-red-400"></ion-icon>
                                </div>
                                <div
                                    class="h-8 w-8 border border-gray-500 rounded-full flex justify-center items-center mx-1">
                                    <ion-icon name="logo-behance" class="text-blue-400"></ion-icon>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="flex items-center justify-around">
                            <div class=" text-center p-4 text-sm">
                                <!-- <ion-icon name="person" class="text-xl  text-indigo-600"></ion-icon> -->
                                <span class="block">Profile</span>
                                <span class="text-gray-500">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star-half"></ion-icon>
                                </span>
                            </div>
                            <div class="p-4 text-center text-sm">
                                <!-- <ion-icon name="heart" class="text-red-400 text-xl"></ion-icon> -->
                                <span class="block">Poke</span>
                                <span class="text-gray-500">{{$totalPokes}} personne</span>
                            </div>

                            <div class="text-center p-4 text-sm">
                                <span class="block">Pin</span>
                                <span class="text-gray-500">{{$totalLocts}} personne</span>
                            </div>
                        </div>

                    </div>
                    <div class="bg-white rounded-2xl shadow-2xl p-8 mt-8">
                        <h1 class="tracking-wide leading-loose capitalize tex-3xl">Education</h1>
                        <span class="text-xs">Education</span>
                        <hr>
                        <div class="my-4">
                            @isset($user->userExtraInfo->education)                              
                                <ul>
                                    @foreach ($user->userExtraInfo->education as $item)
                                    <li class="flex items-center">
                                        <ion-icon name="ellipse" class="text-indigo-600 mr-2"></ion-icon>
                                        <div class="leading-loose tracking-wider">
                                            @foreach ($item as $it)
                                                <span class="mr-1"> {{$it}}</span>
                                            @endforeach
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            @endisset
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-2xl p-8 mt-8">
                        <h1 class="tracking-wide leading-loose capitalize tex-3xl">Int??r??t</h1>
                        <span class="text-xs">Int??r??t</span>
                        <hr>
                        <div class="my-4">
                            @isset($user->userExtraInfo->interet)                              
                                <ul>
                                    @foreach ($user->userExtraInfo->interet as $item)
                                    <li class="flex items-center">
                                        <ion-icon name="checkmark-done-circle" class="text-indigo-600 mr-2"></ion-icon>
                                        <div class="leading-loose tracking-wider uppercase">
                                            {{$item}}
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            @endisset
                        </div>

                    </div>
                    <div class="bg-white rounded-2xl shadow-2xl p-8 mt-8">
                        <h1 class="tracking-wide leading-loose capitalize tex-3xl">Comp??tences</h1>
                        <span class="text-xs">Comp??tences</span>
                        <hr>
                        <div class="my-4">
                            @isset($user->userExtraInfo->skills)                               
                            <ul>
                                @foreach ($user->userExtraInfo->skills as $item)
                                <li class="flex items-center">
                                    <ion-icon name="checkmark-done-circle" class="text-indigo-600 mr-2"></ion-icon>
                                    <div class="leading-loose tracking-wider uppercase">
                                        {{$item}}
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            @endisset
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl shadow-2xl p-8 mt-8">
                        <h1 class="tracking-wide leading-loose capitalize tex-3xl">Langues</h1>
                        <span class="text-xs">Langues</span>
                        <hr>
                        <div class="my-4">
                            @isset($user->userExtraInfo->languages)                               
                                <ul>
                                    @foreach ($user->userExtraInfo->languages as $item)
                                    <li class="flex items-center">
                                        <ion-icon name="checkmark-done-circle" class="text-indigo-600 mr-2"></ion-icon>
                                        <div class="leading-loose tracking-wider uppercase">
                                            {{$item}}
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>

        
        </div>
        
    </section>
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-K9j_V0TfxcRVIamBVipT8kiyFsk2cgE&callback=initMap">
    </script>
    <script defer>

        initMap =  function(){
            var image = new google.maps.MarkerImage("{{ asset('assets/images/marker.png') }}", null, null, null, new google.maps.Size(52,52));
            const map = new google.maps.Map(document.getElementById("map_profile"), {
                zoom: 6,
                center: { 
                    lat: {{$lat}}, 
                    lng: {{$lng}} 
                    },
            });
            function addMarker(location){
                var marker = new google.maps.Marker({
                position: { 
                    lat: location.lat, 
                    lng:location.lng,
                },
                icon: image,
                title: "pined By!",
                map: map
                });
    
    
                marker.addListener('mouseover', () => {
                    infoWindow.open(map, marker)
                })
                const infoWindow = new google.maps.InfoWindow({
                    content : `
                            <div class="w-96 p-2 flex items-center">
                                <img src="{{asset('assets/images/profile.png')}}" alt="" class="w-28 h-28 bg-cover bg-center object-cover mr-2">
                                <div class="">
                                    <h1 class="">${location.name}</h1>
                                    <h1 class="my-4">${location.time}</h1>
                                </div>
                            </div>
                    `
                })
            }

            @foreach ($locts as $loc)
                
                addMarker({ lat: {{ $loc->lat }}, lng: {{ $loc->lng }}, time: "{{ $loc->created_at }}", name:  "{{ $loc->user_id }}" })
            @endforeach
            
    
        }
    
    </script>
@endisset
@endsection