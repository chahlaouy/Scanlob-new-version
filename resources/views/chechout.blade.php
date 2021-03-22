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
    <title>Chekout page</title>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</head>
<body>


    @if (isset($loggedUserInfo) && isset($items))
        @php
            $stripe_key = 'pk_test_51HlQt5AOYmkBFRPiobK1xcueD7vOxqorJIPLnNXmQs8rY3Vydcg5szMTfh9XmbI6KrIZeQ5P5q3wt0Op6D96yDQ7009arhI3sB';
        @endphp
        <header class="w-full h-36 bg-indigo-600 flex items-center justify-center">
            <h1 class="text-4xl text-green-400 uppercase">Paiement</h1>
        </header>
        <section class="max-w-6xl mx-auto text-gray-700 bg-white shadow-2xl rounded-2xl p-8 mt-4">
            <form action="{{route('checkout.credit-card')}}"  method="post" class=" text-xs font-bold" id="payment-form">
                @csrf
                <div class="flex">
                    <div class="flex-1 p-4">
                        
                        <h2 class="text-2xl capitalize my-4 text-gray-900">coordonnées</h2>
                        <hr>
                        {{-- Personal Info --}}
                        <div class="grid grid-cols-2  gap-4">

                            
                            <div>
                                <label class="block mt-4">
                                    <div class="text-gray-700">Nom Prénom <span class="text-red-400">*</span></div>
                                    <input class="form-input block w-full border border-gray-300 my-4 rounded focus:outline-indigo-600"  name="username" value="{{$loggedUserInfo->username}}" required disabled/>
                                </label>
                                <span class="text-red-400">
                                    @error('username')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>

                            
                            <div>
                                <label class="block mt-4">
                                    <span class="text-gray-700">Télephone</span>
                                    <input class="form-input block w-full border border-gray-300 my-4 rounded focus:outline-indigo-600" value="{{$loggedUserInfo->userExtraInfo->phone}}" disabled name="phone" />
                                </label>
                                <span class="text-red-400">
                                    @error('phone')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>

                            
                            <div>
                                <label class="block mt-4">
                                    <div class="text-gray-700">Email <span class="text-red-400">*</span></div>
                                    <input class="form-input block w-full border border-gray-300 my-4 rounded focus:outline-indigo-600" required value="{{$loggedUserInfo->email}}" disabled name="email" />
                                </label>
                                <span class="text-red-400">
                                    @error('email')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>

                        {{-- Billing address --}}
                        <h2 class="text-2xl capitalize my-4 text-gray-900">Adresse de facturation</h2>
                        <hr>
                        <div class="grid grid-cols-2 gap-4">

                            
                            <div>
                                <label class="block mt-4">
                                    <div class="text-gray-700">Numéro de la maison et de la rue <span class="text-red-400">*</span></div>
                                    <input class="form-input block w-full border border-gray-300 my-4 rounded focus:outline-indigo-600" required placeholder="Maison et rue" name="street" />
                                </label>
                                <span class="text-red-400">
                                    @error('street')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>

                            
                            <div>
                                <label class="block mt-4">
                                    <div class="text-gray-700">Ville <span class="text-red-400">*</span></div>
                                    <input class="form-input block w-full border border-gray-300 my-4 rounded focus:outline-indigo-600" required placeholder="ville" name="city" />
                                </label>
                                <span class="text-red-400">
                                    @error('city')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>

                            
                            <div>
                                <label class="block mt-4">
                                    <div class="text-gray-700">Pays <span class="text-red-400">*</span></div>
                                    <input class="form-input block w-full border border-gray-300 my-4 rounded focus:outline-indigo-600" required placeholder="pays" name="country" />
                                </label>
                                <span class="text-red-400">
                                    @error('country')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>

                            
                            <div>
                                <label class="block mt-4">
                                    <div class="text-gray-700">pays de l'État <span class="text-red-400">*</span></div>
                                    <input class="form-input block w-full border border-gray-300 my-4 rounded focus:outline-indigo-600" required placeholder="pays de l'État" name="state" />
                                </label>
                                <span class="text-red-400">
                                    @error('state')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>

                        </div>

                        <div>
                            <div>
                                <label class="block mt-4">
                                    <div class="text-gray-700">Zip code <span class="text-red-400">*</span></div>
                                    <input class="form-input block w-full border border-gray-300 my-4 rounded focus:outline-indigo-600" required placeholder="Zip code" name="zip" />
                                </label>
                                <span class="text-red-400">
                                    @error('zip')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Checkout and paymant --}}
                    <div class="flex-1 p-4">
                        <h2 class="text-2xl capitalize my-4 text-gray-900">caisse et paiement</h2>
                        <hr>
                        <div class="text-gray-600 my-4 flex items-center justify-between">
                            <div>Produit</div>
                            <div>Total</div>
                        </div>
                        <hr>
                        @foreach ($items as $item) 
                        <div class="text-gray-600 my-4 flex items-center justify-between">
                            <div>{{$item->name}}</div>
                            <div>{{$item->quantity}} * {{$item->price}}€</div>
                        </div>
                        <hr>
                        @endforeach
                        <div class="text-gray-600 my-4 flex items-center justify-between">
                            <div>Total</div>
                            <div>{{$total}}€</div>
                        </div>
                        <hr class="mb-4">
                        <h2 class="text-2xl capitalize my-4 text-gray-900">Sélectionner la méthode de paiement</h2>
                        <hr>



                        <div id="stripe">


                            <div class="card-body w-full p-4 bg-gray-100">
                                <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert" class="my-4"></div>
                                <input type="hidden" name="plan" value="" />
                            </div>


                            <div class="card-footer w-full p-4 mt-4">
                                <button
                                id="card-button"
                                class="btn btn-dark w-full bg-indigo-600 text-center rounded-lg text-white py-2"
                                type="submit"
                                data-secret="{{ $intent }}"
                            > Pay </button>
                            </div>


                        </div>




                    </div>
                </div>
            </form>
        </section>

        <script src="https://js.stripe.com/v3/"></script>
        <script>
            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)

            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };
        
            const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
            const elements = stripe.elements(); // Create an instance of Elements.
            const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;
        
            cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.
        
            // Handle real-time validation errors from the card Element.
            cardElement.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
        
            // Handle form submission.
            var form = document.getElementById('payment-form');
        
            form.addEventListener('submit', function(event) {
                event.preventDefault();
        
            stripe.handleCardPayment(clientSecret, cardElement, {
                    payment_method_data: {
                        // billing_details: { name: cardHolderName.value }
                    }
                })
                .then(function(result) {
                    console.log(result);
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        console.log(result);
                        form.submit();
                    }
                });
            });
        </script>
        
    @else
    <header class="w-full h-36 bg-indigo-600 flex items-center justify-center">
        <h1 class="text-4xl text-green-400 uppercase">S 'il voue plais inscrivez vous </h1>
    </header>
    @endif
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>