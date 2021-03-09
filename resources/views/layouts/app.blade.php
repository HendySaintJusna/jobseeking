<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jobblack</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.tiny.cloud/1/405k5wva11ixdga39bpe102ntjsr32p8nfkxss990f0jdd60/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://unpkg.com/vue-truncate-collapsed"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: white;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container" style="        max-width: 1813px;">
                <a class="navbar-brand" style="color:black;font-family: 'Bebas Neue', cursive;font-size:28px;letter-spacing: 1px;" href="{{ url('/') }}">
                    JOBBLACK</span> 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <!--     @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif -->
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Post a job</a>
                                </li>
                            @endif
                        @else

                            <!-- <li class="nav-item">
                                <a href="/home" class="nav-link" style="color:black;">Search a job</a>
                            </li> -->


                            <li class="nav-item">
                                <a href="/hiring" class="nav-link" style="color:orange;">Post a job</a>
                            </li>


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Menu
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   <!--  <a class="dropdown-item" href="/account">
                                        Profile
                                    </a> -->

                                    <!-- <a class="dropdown-item" href="/watchlist">
                                        Watchlist
                                    </a> -->

                                    <a class="dropdown-item" href="/mypost">
                                        My posts
                                    </a>

                                    <a class="dropdown-item" href="/applications">
                                        Applications
                                    </a>


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
    </div>

<!--     <footer>
         <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <p>Copyright &copy; 2021 All Rights Reserved by </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <a href="">About Us</a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <a href="">Contact Us</a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <a href="">Privacy Policy</a>
                </div>
            </div>
    </div>
    </footer> -->

        <!-- <div class="footerbottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                        <p>@ 2021 TITLE </p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                        <a href="" style="color:black;">About Us</a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                        <a href="" style="color:black;">Contact Us</a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                        <a href="" style="color:black;">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div> -->


        <script>
        tinymce.init({
          selector: '#textareatarget',
          plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
          toolbar_mode: 'floating',
        });      
        </script>




</body>
</html>
