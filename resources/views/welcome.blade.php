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
            background-color: #1c1f29;
            color: #ffffff;
        }
        
        .app-header {
            background-color: #0002085;
            color: #ffffff;
        }
        
        .app-content {
            background-color: #03411271;
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
        /* Add more styles as needed for other elements */
    </style>

</head> 

<body class="app">   	
    <header class="app-header fixed-top">	 
        <!--//app-header-inner-->  	            
        @include('layouts.topbar')

        @include('layouts.sidebar')
    </header><!--//app-header-->
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    @include('layouts.dashboard')
                @yield('content')

			    
	    </div><!--//app-content-->
	    
	    <footer class="app-footer mt-1 border-t border-gray-900 text-center">
            <div class="container mx-auto flex flex-wrap justify-between">
                <div class="w-full md:w-1/3 mb-4 md:mb-0">
                    <h4 class="text-xl font-semibold mb-4">Faites vos commandes groupées</h4>
                </div>                   
                </div>
                <div class="w-full md:w-1/3">
                    <p class="text-gray-300 mb-2">Abonnez-vous à notre newsletter pour les dernières mises à jour.</p>
                    <form class="flex">
                        <input type="email" class="bg-gray-700 py-2 px-4 rounded-l-md focus:outline-none focus:ring focus:border-blue-500" placeholder="Votre e-mail">
                        <button type="submit" class="bg-blue-500 text-black py-2 px-6 rounded-r-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">S'abonner</button>
                    </form>
                </div>
            </div>
            <div class="app-footer mt-8 border-t border-gray-600 text-center">
                <p class="text-gray-300">© 2023 Tous droits réservés. Mentions légales | Politique de confidentialité</p>
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
