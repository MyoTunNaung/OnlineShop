<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Classic OnlineShop</title>

    <link rel="icon" href="{{ asset("images/c.jpg")}}">

    <link rel="stylesheet" href="{{ asset("style.css") }}">    
   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />

    <!-- Zoom Image -->

    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    
    <!--<script src="js/jquery-1.9.1.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>

    
    <link rel="stylesheet" type="text/css" href="{{ asset("jquery.exzoom.css") }} ">
    <script src="{{ asset("jquery.exzoom.js") }}"></script>

    
    <!-- Zoom Image -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('mmenu-light.css') }}" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div id="app">
        
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    OnlineShop
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        
                      
                        @if(Auth::check())
                        @if(Auth::user()->id == 1 || Auth::user()->id == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/category/list') }}">
                                Category
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/item/list') }}">
                                Item
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/product/list') }}">
                                Product
                            </a>
                        </li>
                        @endif
                        @endif
                      

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                      <!-- Shopping Cart  -->
                      <a href="{{ url("/product/shoppingCart") }}" style="background-color: #f89224;" class="btn btn-outline-dark"   >

                          <i class="fas fa-shopping-cart"></i> 
                             Shopping Cart
                          [ {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }} ] 
                          
                      </a>
                      <!-- End Shopping Cart -->

                        
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
  


        <main class="py-4">
            @yield('content')
        </main>

<!-- Footer -->

  <div class="container-fluid">
        <div class="row">
          <body>
          <!-- Remove the container if you want to extend the Footer to full width. -->
      <div class="container my-5">

        <footer class="text-white text-center text-lg-start bg-dark">
          <!-- Grid container -->
          <div class="container p-4">
            <!--Grid row-->
            <div class="row mt-4">
              <!--Grid column-->
              <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">About Our OnlineShop</h5>

                <p>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                  voluptatum deleniti atque corrupti.
                </p>

                <p>
                  Blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
                  molestias.
                </p>

                <div class="mt-4">
                  <!-- Facebook -->
                  <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-facebook-f"></i></a>
                  <!-- Dribbble -->
                  <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-dribbble"></i></a>
                  <!-- Twitter -->
                  <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-twitter"></i></a>
                  <!-- Google + -->
                  <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-google-plus-g"></i></a>
                  <!-- Linkedin -->
                </div>
              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4 pb-1">Search something</h5>

                <div class="form-outline form-white mb-4">
                  <input type="text" id="formControlLg" class="form-control form-control-lg" />
                  <label class="form-label" for="formControlLg">Search</label>
                </div>

                <ul class="fa-ul" style="margin-left: 1.65em;">
                  <li class="mb-3">
                    <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Pakokku, Myanmar</span>
                  </li>
                  <li class="mb-3">
                    <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">classicpku@outlook.com</span>
                  </li>
                  <li class="mb-3">
                    <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+ 48 234 567 88</span>
                  </li>
                </ul>
              </div>
              <!--Grid column-->

              <!--Grid column-->
              <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">Opening hours</h5>

                <table class="table text-center text-white">
                  <tbody class="fw-normal">
                    <tr>
                      <td>Mon - Thu:</td>
                      <td>8am - 9pm</td>
                    </tr>
                    <tr>
                      <td>Fri - Sat:</td>
                      <td>8am - 1am</td>
                    </tr>
                    <tr>
                      <td>Sunday:</td>
                      <td>9am - 10pm</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!--Grid column-->
            </div>
            <!--Grid row-->
          </div>
          <!-- Grid container -->

          <!-- Copyright -->
          <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">Classic PKU</a>
          </div>
          <!-- Copyright -->
        </footer>

      </div>
<!-- End of Footer -->


</div>  

</body>
</html>
