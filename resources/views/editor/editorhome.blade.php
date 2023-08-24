{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editor Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in as an Editor!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


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
        body {
            /* background-color: rgba(135, 189, 142, 0.897); */
            background-image: url('/images/6148228_3163920.jpg');
            background-repeat: no-repeat;
            /* background-size: cover; */
            background-attachment: fixed;
            color: white;
        }

        .btn-success {
            background-color: seagreen;
            border-color: #77f597;
            color: black;
            /* Changer la couleur du texte en blanc */
        }

        .btn-success:hover {
            background-color: #68d88c;
            border-color: #68d88c;
            color: white;
        }

        .table td,
        .table th {
            border-color: #1c1f29;
        }

        .app-card {
            background-color: #a5f1af;
            border-color: #000000;
            border-width: 1px;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 1);
            height: 80px;
            padding: 1px;
            /* Change this color for the table cell background */
        }

        .table {
            /* background: rgba(0,0,0,0.5) #4f5569; */
            background-color: rgb(240, 240, 240, 0.5);
            backdrop-filter: blur(30px);
            color: white;

        }

        .table td {
            background-color: rgba(80, 100, 83, 0.2);
            color: #fff;
        }

        @keyframes animated {
            0% {
                filter: blur(60px) hue-rotate(0deg);
            }

            100% {
                filter: blur(60px) hue-rotate(0deg);
            }
        }

        .table th {
            background-color: #13c44e;
            color: black;
        }

        .table td,
        .table th {
            border-color: #1c1f29;
        }

        .btn-success {
            background-color: #77f597;
            border-color: #77f597;
        }

        .btn-success:hover {
            background-color: #68d88c;
            border-color: #68d88c;
        }

        /* Additional styles as needed */

        .text-center {
            text-align: center;
        }

        .btn-close {
            color: white;
        }

        .table {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
        }

        .table td {
            background-color: rgba(80, 100, 83, 0.062);
            color: white;
        }

        .table th {
            background-color: #13c44e;
            color: white;
        }

        .table td,
        .table th {
            border-color: #1c1f29;
        }

        .btn-success {
            background-color: #77f597;
            border-color: #77f597;
        }

        .btn-success:hover {
            background-color: #68d88c;
            border-color: #68d88c;
        }

        /* Add more styles as needed for other elements */
    </style>

</head>

<body class="container">
    <header class="app-header fixed-top">
        @include('layouts.topbar')
    </header><!--//app-header-->


    @yield('scripts')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h3>Ajout de produits</h3>
            </div>
            <div class="text-center">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Créer un nouveau produit</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Prix</th>
                <th>Transport</th>
                <th>Délai Clôture</th>
                <th>Details</th>
                <th width="250px">Action</th>
            </tr>
            @php
                $i = 0;
            @endphp
            @foreach ($products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td><img src="{{ URL::asset('storage/images/' . $product->imageProd) }}" width="100px"
                            height="100px"></td>
                    <td>{{ $product->nameProd }}</td>
                    <td>{{ number_format($product->prixProd, 0, '', '') }}</td>
                    <td>{{ $product->transport }}</td>
                    <td>{{ $product->delaiCloture }}</td>
                    <td>{{ $product->details }}</td>
                    <td>
                        <form action="{{ route('products.destroy', $product->idProd) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('products.edit', $product->idProd) }}">Modifier</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


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
