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
        }.card-container {
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

        /* Add more styles as needed for other elements */
    </style>

</head>

<body class="app">
    <div class="container">
        <div id="error-message" class="alert alert-danger" style="display: none;"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">Payement Réussi</h2>

                <div class="card-body">
                    <h4>Merci pour votre commande! Le payement a été bien éffectué</h4>
                    <h6>Vous serrez contacté le plus tôt possible.</h6>
                    <button class="btn btn-primary" onclick="redirectToHome()">Retourner à la page d'accueil</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function redirectToHome() {
        window.location.href = "{{ route('home') }}";
    }
</script>

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
