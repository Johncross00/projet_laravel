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
        body{
            background-image: url('/images/6148228_3163920.jpg');
            background-size: cover;
            background-position: center;
            font-family: "Poppins", sans-serif;
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
        

        /* Positionnement du bouton "Retour" à droite */
        .pull-left {
            float: left;
        }
        
        .wrapper {
            width: 720px;
            height: auto;
            background: rgba(19, 46, 21, 0.5);
            border: 2px solid rgb(0, 252, 13);
            backdrop-filter: blur(30px);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #fff;
            border-radius: 10px;
            padding: 30px 40px;
            margin: 0 auto;
            margin-top: 100px;
        }
        .wrapper h2 {
            font-size: 36px;
            text-align: center;
        }
        .input-box {
            position: relative;
            margin: 30px 0;
        }
        .input-box input {
            width: 100%;
            height: 50px;
            background: transparent;
            outline: none;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            font-size: 16px;
            color: #fff;
            padding: 20px 45px 20px 20px;
        }
        .input-box input::placeholder {
            color: #fff;
        }

        .input-box i {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }
        .btn {
            width: 100%;
            height: 45px;
            background: #fff;
            border: none;
            outline: none;
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            color: #333;
            font-weight: 600;
        }

        
        
        /* Add more styles as needed for other elements */
    </style>

</head>

<body>
    <header class="app-header fixed-top">	   	            
        @include('layouts.topbar')
        <!--//app-header-inner-->
    </header>
    <!--//app-header-->
    @yield('scripts')
    <div class="pull-left">
        <a class="btn btn-primary" href="{{ route('editor.home') }}"> Retour</a>
    </div>
    <div class="wrapper">
        
        <h2>Ajout de produits</h2>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif<!--//app-card-body-->
        
            <!-- Statut de la session -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
        
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Oups !</strong> Il y a eu des problèmes avec votre saisie.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
        
                <div class="input-box">
                    <strong>Nom du produit :</strong>
                    <input type="text" name="nameProd" class="form-control" placeholder="Nom du produit"
                        value="{{ old('nameProd') }}" required autofocus />
                    @error('nameProd')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="input-box">
                    <strong>Image du produit :</strong>
                    <input type="file" name="imageProd" class="form-control" placeholder="Image du produit"
                    value="{{ old('imageProd') }}" accept=".jpeg,.png,.jpg,.gif,.svg" required />
                    <img src="{{ asset('storage/images/' . $product->imageProd) }}" alt="{{ $product->nameProd }}"
        
                    @error('imageProd')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="input-box">
                    <strong>Prix du produit :</strong>
                    <input type="number" name="prixProd" class="form-control" placeholder="Prix du produit"
                        value="{{ old('prixProd') }}" min="0" required />
                    @error('prixProd')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="input-box">
                    <strong>Transport :</strong>
                    <select name="transport" class="form-control" required>
                        <option value="Avion" {{ old('transport') === 'Avion' ? 'selected' : '' }}>Avion</option>
                        <option value="Bateau" {{ old('transport') === 'Bateau' ? 'selected' : '' }}>Bateau</option>
                    </select>
                    @error('transport')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="input-box">
                    <strong>Délai de clôture :</strong>
                    <input type="date" name="delaiCloture" class="form-control" placeholder="Délai de clôture"
                        value="{{ old('delaiCloture') }}" required />
                    @error('delaiCloture')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="input-box">
                    <strong>Détails :</strong>
                    <textarea name="details" class="form-control" rows="4">{{ old('details', 'Aucun détail') }}</textarea>
                    @error('details')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="flex items-center justify-between mt-4">
                    <button type="reset" class="btn btn-secondary">Annuler</button>
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </div>
        
            </form>
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







{{-- @extends('welcome')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ajouter un nouveau produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Retour</a>
            </div>
        </div>
    </div>

    <!-- Statut de la session -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oups !</strong> Il y a eu des problèmes avec votre saisie.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <strong>Nom du produit :</strong>
            <input type="text" name="nameProd" class="form-control" placeholder="Nom du produit"
                value="{{ old('nameProd') }}" required autofocus />
            @error('nameProd')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <strong>Image du produit :</strong>
            <input type="file" name="imageProd" class="form-control" placeholder="Image du produit"
            value="{{ old('imageProd') }}" accept=".jpeg,.png,.jpg,.gif,.svg" required />
            <img src="{{ asset('storage/images/' . $product->imageProd) }}" alt="{{ $product->nameProd }}"

            @error('imageProd')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <strong>Prix du produit :</strong>
            <input type="number" name="prixProd" class="form-control" placeholder="Prix du produit"
                value="{{ old('prixProd') }}" min="0" required />
            @error('prixProd')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <strong>Transport :</strong>
            <select name="transport" class="form-control" required>
                <option value="Avion" {{ old('transport') === 'Avion' ? 'selected' : '' }}>Avion</option>
                <option value="Bateau" {{ old('transport') === 'Bateau' ? 'selected' : '' }}>Bateau</option>
            </select>
            @error('transport')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <strong>Délai de clôture :</strong>
            <input type="date" name="delaiCloture" class="form-control" placeholder="Délai de clôture"
                value="{{ old('delaiCloture') }}" required />
            @error('delaiCloture')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <strong>Détails :</strong>
            <textarea name="details" class="form-control" rows="4">{{ old('details', 'Aucun détail') }}</textarea>
            @error('details')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-between mt-4">
            <button type="reset" class="btn btn-secondary">Annuler</button>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </div>

    </form> --}}
{{-- @endsection --}}
