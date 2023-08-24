{{-- <div id="error-message" class="alert alert-danger" style="display: none;"></div>

    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Produit</th>
                <th style="width:10%">Prix</th>
                <th style="width:8%">Quantité</th>
                <th style="width:22%" class="text-center">Sous-Total</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    @php $total += $details['prixProd'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img
                                        src="{{ asset('storage/images/') }}/{{ $details['imageProd'] }}" width="100"
                                        height="100" class="img-responsive" /></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['nameProd'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{ $details['prixProd'] }} XOF</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}"
                                class="form-control quantity cart_update" min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">{{ $details['prixProd'] * $details['quantity'] }} XOF
                        </td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i>
                                Supprimer</button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align:right;">
                    <h3><strong>Total {{ $total }} XOF</strong></h3>
                </td>
            </tr>
            <tr>
                <td colspan="5" style="text-align:right;">
                    <form action="/session" method="POST">
                        <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Retour
                        </a>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-success" type="button" onclick="checkInternetConnection()">
                            <i class="fa fa-money"></i> Payer
                        </button>

                    </form>
                </td>
            </tr>
        </tfoot>
    </table>

@section('scripts')
    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $("#error-message").text("Erreur lors de la mise à jour, Réessayez.").show();
                }
            });
        });

        $(".cart_remove").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Supprimer le produit?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $("#error-message").text("Erreur lors de la suppression. Réesssayez").show();
                    }
                });
            }
        });

        function checkInternetConnection() {
            fetch("https://www.google.com")
                .then(response => {
                    if (response.status === 200) {
                        // Internet is available, proceed to checkout
                        window.location.href = "{{ route('session') }}";
                    } else {
                        // Internet is not available, show a message
                        alert("Veuillez vous connecter à Internet avant de procéder au paiement.");
                    }
                })
                .catch(error => {
                    // Internet is not available, show a message
                    alert("Veuillez vous connecter à Internet avant de procéder au paiement.");
                });
        }
    </script>
@endsection --}}
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
            background-image: url('/images/Le-Chai-d039Anthon-Z_ROMAIN-QUINTON_Commande-Groupée_Affiche-présentation2.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            color: #ffffff;
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
            background-color: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(5px);
            color: #fff;
        }

        .table td {
            background-color: rgba(41, 65, 41, 0.3);
            color: white;
        }

        .table th {
            background-color: #13c44e;
            color: white;
        }
        .table td,
        .table th {
            border-color: #fff;
        }
        .table td .btn-danger {
            color: white;
        }
        .table td {
            color: white;
        }
        tfoot {
    color: white;
        }
        h1 h2 h3 h4 h5{
            color: #fff;
        }

        /* Add more styles as needed for other elements */
    </style>

</head>

<body class="app">
    <div class="container">
        <div id="error-message" class="alert alert-danger" style="display: none;"></div>

    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Produit</th>
                <th style="width:10%">Prix</th>
                <th style="width:8%">Quantité</th>
                <th style="width:22%" class="text-center">Sous-Total</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if (session('cart'))
                @foreach (session('cart') as $id => $details)
                    @php $total += $details['prixProd'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img
                                        src="{{ asset('storage/images/') }}/{{ $details['imageProd'] }}" width="100"
                                        height="100" class="img-responsive" /></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['nameProd'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{ number_format($details['prixProd'] , 0, '', '')}} FCFA</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}"
                                class="form-control quantity cart_update" min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">{{ $details['prixProd'] * $details['quantity'] }} FCFA
                        </td>
                        <td class="actions" data-th="">
                            <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i>
                                Supprimer</button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="text-align:right;">
                    <h3><strong>Total {{ $total }} FCFA</strong></h3>
                </td>
            </tr>
            <tr>
                <td colspan="5" style="text-align:right;">
                    <form action="/session" method="POST">
                        <a href="{{ url('/') }}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Retour
                        </a>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class="btn btn-success" type="button" onclick="checkInternetConnection()">
                            <i class="fa fa-money"></i> Payer
                        </button>

                    </form>
                </td>
            </tr>
        </tfoot>
    </table>

@section('scripts')
    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $("#error-message").text("Erreur lors de la mise à jour, Réessayez.").show();
                }
            });
        });

        $(".cart_remove").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Supprimer le produit?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $("#error-message").text("Erreur lors de la suppression. Réesssayez").show();
                    }
                });
            }
        });

        function checkInternetConnection() {
            // fetch("https://www.google.com")
            //     .then(response => {
            //         if (response.status === 200) {
            //             // Internet is available, proceed to checkout
            //             window.location.href = "{{ route('session') }}";
            //         } else {
            //             // Internet is not available, show a message
            //             alert("Veuillez vous connecter à Internet avant de procéder au paiement.");
            //         }
            //     })
            //     .catch(error => {
            //         // Internet is not available, show a message
            //         alert("Veuillez vous connecter à Internet avant de procéder au paiement.");
            //     });
            var online = navigator.onLine;

            if (online) {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = "{{ route('session') }}";
                var csrfField = document.createElement('input');
                csrfField.setAttribute('type', 'hidden');
                csrfField.setAttribute('name', '_token');
                csrfField.setAttribute('value', '{{ csrf_token() }}');

                form.appendChild(csrfField);

                document.body.appendChild(form);
                form.submit();
            } else {
                    // Internet is not available, show a message
                    alert("Veuillez vous connecter à Internet avant de procéder au paiement.");
                }
            

            // Écouteur pour surveiller les changements de connectivité
            window.addEventListener('online', function () {
                checkInternetConnection();
            });

            window.addEventListener('offline', function () {
                checkInternetConnection();
            });
        }
    </script>
@endsection
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