<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 10 Shopping Cart add to cart with Stripe Payment Gateway</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
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

<body>
    <div class="container">
        <div class='row'>
            <h1>Annuler le payement par Stripe</h1>
            <div class='col-md-12'>
                <div class="card">
                    <div class="card-header">
                        Annuler
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/') }}" class="btn btn-info"> <i class="fa fa-arrow-left"></i> Retourner
                            sur la page des produits</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
