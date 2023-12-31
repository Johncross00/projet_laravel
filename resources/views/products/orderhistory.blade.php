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
            background-image: url('/images/low-angle-view-two-female-workers-reading-delivery-schedule-list-while-working-distribution-warehouse.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            color: white;
        }

        .app-header {
            background-color: #0002085;
            color: #ffffff;
        }

        .app-content {
            background-color: #77f597da
        }

        .app-footer {
            color: #ffff;
        }

        footer {
            display: flex;
            justify-content: space-between;
        }

        footer div {
            width: 100%;
        }
        .table {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
        }

        .table td {
            background-color: rgba(41, 65, 41, 0.4);
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


        /* Add more styles as needed for other elements */
    </style>

</head>

<body class="app">
    <div class="container">
        <div id="error-message" class="alert alert-danger" style="display: none;"></div>
        <div class="container">
            <div class="container mt-4">
                <a href="{{ route('home') }}" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Retour</a>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">

                    {{-- <div class="card"> --}}
                    <div class="header">Historique des commandes</div>

                    <div class="body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Produit</th>
                                    <th>Quantité</th>
                                    <th>Total Coût</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->created_at }}</td>
                                        <td>
                                            @if ($order->product)
                                                {{ $order->product->nameProd }}
                                            @else
                                                Produit non disponible
                                            @endif
                                        </td>
                                        <td>{{ $order->quantite }}</td>
                                        <td>{{ number_format($order->montant_total, 0, '', '') }} FCFA</td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
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

    </div>



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
