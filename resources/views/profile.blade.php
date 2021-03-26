@extends('layouts.master')

@section('title')

    Profile
    @isset($user)
        {{$user->username}}
    @endisset
@endsection

@section('content')
@isset($user)
    <!-- Map Modal -->
    <div id="mapModel" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="w-full p-4">
                <div class="bg-white rounded-2xl shadow-2xl p-8 mt-8">
                    <h1 class="tracking-wide leading-loose capitalize tex-3xl">Addresse</h1>
                    <span class="text-xs">Veuillez Votre addresse</span>
                    <hr class="mb-4">
                    <span class="text-red-400">
                        @error('address')
                            {{$message}}
                        @enderror
                    </span>
                    <input
                    name="address"
                    id="pac-input"
                    class="controls py-2 px-4 border border-indigo-600 w-full rounded"
                    type="text"
                    placeholder="Entrer Votre addresse"
                    />
                    <div id="map" class="w-full h-96"></div>
                </div>
            </div>
        </div>

    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="w-full p-4">
                <form action="/ajouter-avis/{{$user->id}}" method="POST">
                    @csrf
                    <h1 class="text-center text-gray-700 text-3xl">
                        Votre Avis
                    </h1>
                    <label class="block mt-4">
                        <span class="text-gray-700">Titre</span>
                        <input class="form-input block w-full border-2 border-gray-300 my-4 rounded focus:outline-indigo-600" placeholder="Placer le titre de votre message ici" name="title">
                    </label>
                    <span class="text-red-400">
                        @error('title')
                            {{$message}}
                        @enderror
                    </span>
                    <label class="block mt-4">
                        <span class="text-gray-700">Message</span>
                        <textarea class="form-input block w-full border-2 border-gray-300 my-4 rounded focus:outline-indigo-600" placeholder="votre message" name="body"></textarea>
                    </label>
                    <span class="text-red-400">
                        @error('body')
                            {{$message}}
                        @enderror
                    </span>
                    <button class="bg-indigo-600 px-4 py-2 rounded text-white block" type="submit">
                        Envoyer
                    </button>
                </form>
            </div>
        </div>

    </div>
    <section class="container mx-auto bg-profile md:flex md:justify-between rounded-3xl">
        
        <div class="bg-gray-800 bg-opacity-5 rounded-3xl p-1 md:p-16 w-full">
            @if (Session::get('success'))
            <div class="bg-green-300 w-full py-4 text-center rounded my-4">
                {{Session::get('success')}}
                </div>
            @endif
            @if (Session::get('fail'))
                <div class="bg-red-300 w-full py-4 text-center rounded my-4">
                    {{Session::get('fail')}}
                </div>
            @endif 
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
                    {{-- <div class="p-4">
                        <div class="bg-indigo-200 w-full h-96 rounded-xl">
                            <div class="h-full w-full" id="map_profile"></div>
                        </div>
                    </div> --}}
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
                                <span class="text-gray-500">155 personne</span>
                            </div>
    
                            <div class="text-center p-4 text-sm">
                                <span class="block">Pin</span>
                                <span class="text-gray-500">155 personne</span>
                            </div>
                        </div>
                        
                        <div class="md:flex mt-4">
                            <button class="px-4 py-2 bg-indigo-600 rounded-lg shadow-xl text-white mt-4 flex items-center mr-4">
                                <ion-icon name="flash-outline" class="mr-2 text-lg"></ion-icon>
                                <span>Poke</span>
                            </button>
                            <button class="px-4 py-2 bg-gray rounded-lg shadow-xl text-indigo-600 mt-4 flex items-center" id="location-button">
                                <ion-icon name="locate-outline" class="mr-2 text-xl"></ion-icon>
                                <span>Pin</span>
                            </button>
                            <button id="btn-modal" class="px-4 py-2 bg-gray rounded-lg shadow-xl text-white bg-indigo-600 mt-4 flex items-center">
                                <ion-icon name="chatbubbles-outline" class="mr-2 text-xl"></ion-icon>
                                <span>Dis Quelquechose</span>
                            </button>
    
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
                        <h1 class="tracking-wide leading-loose capitalize tex-3xl">Intérêt</h1>
                        <span class="text-xs">Intérêt</span>
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
                        <h1 class="tracking-wide leading-loose capitalize tex-3xl">Compétences</h1>
                        <span class="text-xs">Compétences</span>
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
        window.initMap =  function(){

        const myLatLng = { lat: -25.363, lng: 131.044 };
        const map = new google.maps.Map(document.getElementById("map_profile"), {
            zoom: 4,
            center: myLatLng,
        });
        new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello World!",
        });
        }
        window.initAutocomplete = function () {
        const map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -33.8688, lng: 151.2195 },
            zoom: 13,
            mapTypeId: "roadmap",
        });
        // Create the search box and link it to the UI element.
        const input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);
        // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener("bounds_changed", () => {
            searchBox.setBounds(map.getBounds());
        });
        let markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener("places_changed", () => {
            const places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }
            // Clear out the old markers.
            markers.forEach((marker) => {
                marker.setMap(null);
            });
            markers = [];
            // For each place, get the icon, name and location.
            const bounds = new google.maps.LatLngBounds();
            places.forEach((place) => {
                if (!place.geometry || !place.geometry.location) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                const icon = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25),
                };
                // Create a marker for each place.
                markers.push(
                    new google.maps.Marker({
                        map,
                        icon,
                        title: place.name,
                        position: place.geometry.location,
                    })
                );

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }
        infoWindow = new google.maps.InfoWindow();
            const locationButton = document.getElementById('location-button')
            locationButton.addEventListener("click", () => {
                // Try HTML5 geolocation.
                if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    console.log(pos)
    
                    /*  send ajax request to back end here*/
    
                    window.$.ajax( {
                            type: 'POST',
                            header:{
                                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                            },
                            url: "/api/pin",
                            data:{
                                _token: "{{ csrf_token() }}",
                                dataType: 'json', 
                                contentType:'application/json', 
                                lat: pos.lat,
                                lng: pos.lng,
                                profileId: {{ $user->id }},
                                @if (isset($loggedUserInfo))
                                    username: "{{ $loggedUserInfo->username }}",
                                @else
                                    username: "unknown"
                                @endif
                            },
                        
                        })
                            .done((data) => {
                                console.log(data)
                            })
                            .fail((data) => {
                                
                            });
    
                    infoWindow.setPosition(pos);
                    infoWindow.setContent("Emplacement trouvé.");
                    infoWindow.open(map);
                    map.setCenter(pos);
                    },
                    () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
                } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
                }
            });
            function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
                infoWindow.setContent(
                    browserHasGeolocation
                    ? "Error: The Geolocation service failed."
                    : "Error: Your browser doesn't support geolocation."
                );
                infoWindow.open(map);
            }
    </script>
    
@endisset
@endsection
