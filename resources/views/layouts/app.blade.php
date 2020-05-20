<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" src="images/logo/fat-cat-logo.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fat.Cat Store</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


    <!--AOS-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />

    <!--Sweet alert-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--jquery ui-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" defer>

    <!--datatables
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    -->
    
</head>
<body>

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm no-gutter">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img height="50" width="70"  src="images/logo/fat-cat-logo.png" alt="image">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Scrunchies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Korean Fashion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Accessories</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

   
        @yield('content')
     
 

    <!-- Optional JavaScript -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


    <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" defer></script>

    <script>
        $(".newly-arrived-carousel").slick({
                    arrows: true,
                    infinite: false,
                    speed: 150,
                    dots: true,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    slidesToShow: 4,
                    slidesToScroll: 3,
                    responsive: [{
                        breakpoint: 1024,
                        settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        arrows: true
                        }
                    }, {
                        breakpoint: 600,
                        settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        arrows: true
                        }
                    }, {
                        breakpoint: 480,
                        settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: true
                        }
                    } // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                    ]
                    });
        
        </script>
</body>
</html>
