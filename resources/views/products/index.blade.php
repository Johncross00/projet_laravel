<!DOCTYPE html>
<html lang="en">

<head>
    <title>Commandes groupées</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">



    <meta name="description" content="Commandes groupées">
    <meta name="John" content="Commandes groupées">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/css/portal.css') }}">

    <style>
        /* Styles for dark theme */
        body.app {
            background-image: url('/images/Get the We Heart It app!.jpeg');
            background-attachment: fixed;
            color: #ffffff;
        }

        .app-header {
            background-color: #0002085;
            color: #ffffff;
        }

        /* .app-content {
            background-color: #77f597da
        } */

        .app-footer {
            height: auto;
            background-color: #333;
            color: #ffff;
            position: static;
            bottom: 0;
            width: 100%;
        }

        footer {
            display: flex;
            justify-content: space-between;
            width: 100%;


        }

        /* footer div {
            width: 100%;
        } */

        .card-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin: 20px auto;
        }

        .card {
            /* width: calc(33.33% - 20px); */
            height: auto;
            background: rgba(19, 46, 21, 0.5);
            border: 2px solid rgb(0, 252, 13);
            backdrop-filter: blur(30px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .card img {
            max-width: 100%;
            max-height: auto;
            border-radius: 10px;
        }

        .card h5 {
            font-size: 23px;
            margin-bottom: -10px;
            padding: 5px;
        }

        .card p {
            font-size: 14px;
        }

        .card .btn {
            display: block;
            margin-top: 15px;
        }

        .btn-primary {
            color: #fff;
            /* Couleur de texte en blanc */
        }

        /* Changer la couleur du texte des boutons dans la dropdown */
        .dropdown-menu .btn-primary {
            color: #000;
            /* Couleur de texte en noir */
        }

        /* Add more styles as needed for other elements */
    </style>

</head>

<body class="app">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12">
                @auth
                    <div class="dropdown">

                        <button id="dLabel" type="button" class="btn btn-primary" data-bs-toggle="dropdown">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Panier <span
                                class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                        </button>

                        <div class="dropdown-menu" aria-labelledby="dLabel">
                            <div class="row total-header-section">
                                @php $total = 0 @endphp
                                @foreach ((array) session('cart') as $id => $details)
                                    @php $total += $details['prixProd'] * $details['quantity'] @endphp
                                @endforeach
                                <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                    <p>Total: <span class="text-success">{{ $total }} FCFA</span></p>
                                </div>
                            </div>
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    <div class="row cart-detail">
                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                            <img src="{{ asset('storage/images/') }}/{{ $details['imageProd'] }}" />
                                        </div>
                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                            <p>{{ $details['nameProd'] }}</p>
                                            <span class="price text-success">{{ $details['prixProd'] }} FCFA</span> <span
                                                class="count"> Quantité:{{ $details['quantity'] }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            @if (session('cart') && count(session('cart')) > 0)
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="{{ route('cart') }}" class="btn btn-primary btn-block">Tout voir</a>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                @else
                    <div id="error-message" class="alert alert-danger" style="display: none;">
                        Vous devez être connecté pour accéder à votre panier. <a href="{{ route('login') }}">Se
                            connecter</a>
                    </div>

                    <script>
                        // ... Votre code JavaScript existant ...

                        // Ajoutez cette partie pour afficher le message si l'utilisateur n'est pas connecté
                        @guest
                        $(document).ready(function() {
                            $("#error-message").show();
                        });
                        @endguest
                    </script>
                @endauth


            </div>
        </div>
    </div>



    @yield('scripts')
    <header class="app-header fixed-top">
        <!--//app-header-inner-->
        @include('layouts.topbar')

    </header><!--//app-header-->

    <div class="row">
        <div class="col-lg-12 margin-tb">

        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif



    <div class="row">
        @foreach ($products as $product)
            <div class="col-xs-12 col-sm-6 col-md-3" style="margin-top: 10px;">
                <div class="card">
                    <img src="{{ URL::asset('storage/images/' . $product->imageProd) }}" class="card-img-top"
                        alt="{{ $product->nameProd }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->nameProd }}</h5>
                        <h5 class="card-title">{{ number_format($product->prixProd, 0, '', '') }} FCFA</h5>
                        <p class="card-text"><strong>Transport: </strong> {{ $product->transport }}</p>
                        <p class="card-text"><strong>Délai Clôture: </strong> {{ $product->delaiCloture }}</p>
                        <p class="card-text">{{ $product->details }}</p>
                        <div class="text-center">
                            <a href="{{ route('add_to_cart', $product->idProd) }}" class="btn btn-primary">Ajouter au
                                panier</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



    <footer class="app-footer border-t text-center">
        <div class="container mx-auto flex flex-wrap justify-between">
            <div class="w-full md:w-1/3">
                <p class="text-gray-300 mb-2">Abonnez-vous à notre newsletter pour les dernières mises à jour.
                </p>
                <form class="flex">
                    <input type="email"
                        class="bg-gray-700 py-2 px-4 rounded-l-md focus:outline-none focus:ring focus:border-blue-500"
                        placeholder="Votre e-mail">
                    <button type="submit"
                        class="bg-blue-500 text-black py-2 px-6 rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">S'abonner</button>
                </form>
                <p class="text-gray-300 mt-8">© 2023 Tous droits réservés. Mentions légales | Politique de
                    confidentialité</p>
            </div>
        </div>
    </footer>



    <!--//app-footer-->

    </div><!--//app-wrapper-->

    <!-- Javascript -->
    <script src="{{ asset('assets/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Charts JS -->
    <script src="{{ asset('assets/plugins/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/index-charts.js') }}"></script>

    <!-- Page Specific JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>


{{-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2>Ajout de produits</h2>
        </div>
        <div class="text-center">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="row">
    @foreach ($products as $product)
        <div class="col-xs-12 col-sm-6 col-md-3" style="margin-top: 10px;">
            <div class="card">
                <img src="{{ URL::asset("storage/images/" . $product->imageProd) }}" class="card-img-top" alt="{{ $product->nameProd }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->nameProd }}</h5>
                    <h5 class="card-title">{{ $product->prixProd }} XOF</h5>
                    <p class="card-text"><strong>Transport: </strong> {{ $product->transport }}</p>
                    <p class="card-text"><strong>Délai Clôture: </strong> {{ $product->delaiCloture }}</p>
                    <p class="card-text">{{ $product->details }}</p>
                    <div class="text-center">
                        <a href="{{ route('add_to_cart', $product->idProd) }}" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    <div class="col-lg-12">
        {!! $products->links() !!}
    </div>
</div>
 

 --}}
