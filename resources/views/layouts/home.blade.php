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
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="background: #ffb512">
            <div class="container" style="    max-width: 1345px;">
                <a class="navbar-brand" style="color:black;font-family: 'Bebas Neue', cursive;font-size:28px;letter-spacing: 1px;" href="{{ url('/') }}">
                    JOB<span style="color:black;">BLACK</span> 
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
                   
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="login" style="color:white;margin-right: 20px;font-family: Rubik, sans-serif;">Post a job</a>
                                </li>
                            @endif
                        @else

                            <!-- <li class="nav-item">
                                <a href="/home" class="nav-link" style="color:white;    margin-right: 20px;">Search a job</a>
                            </li> -->


                            <li class="nav-item">
                                <a href="/hiring" class="nav-link" style="color:white;    margin-right: 20px;font-family: Rubik, sans-serif;">Post a job</a>
                            </li>


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Menu
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <!--   <a class="dropdown-item" href="/account">
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

        <main class="py-0">
            @yield('content')
        </main>
    </div>

       <!--  <div class="footer">
          <p>Footer</p>
        </div> -->



       <footer class="site-footer">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <h6>About Us</h6>
                <p class="text-justify">Jobblack is a place where black businesses are looking to hire employees from the community. It's easier to get along when you work with your neighbor. We are currently in Beta version and hope to expand over time!</p>
              </div>

              

              <div class="col-xs-6 col-md-3">
                <h6>Quick Links</h6>
                <ul class="footer-links">
                  <li><a href="/information">About Us</a></li>
                  <li><a href="/information">Contact Us</a></li>
                  <!-- <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li> -->
                  <li><a href="/information">Privacy Policy</a></li>
                  <!-- <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li> -->
                </ul>
              </div>


              <div class="col-xs-6 col-md-3">
                <h6></h6>
                <ul class="footer-links">
                  <li><a href="http://scanfcode.com/category/c-language/"></a></li>
                  <li><a href="http://scanfcode.com/category/front-end-development/"></a></li>
                  <li><a href="http://scanfcode.com/category/back-end-development/"></a></li>
                  <li><a href="http://scanfcode.com/category/java-programming-language/"></a></li>
                  <li><a href="http://scanfcode.com/category/android/"></a></li>
                  <li><a href="http://scanfcode.com/category/templates/"></a></li>
                </ul>
              </div>

            </div>
            <hr>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by Jobblack
                </p>
              </div>

              <div class="col-md-4 col-sm-6 col-xs-12">
              <!--   <ul class="social-icons">
                  <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
                </ul> -->
              </div>
            </div>
          </div>
    </footer>


        <script>
        tinymce.init({
          selector: '#textareatarget',
          plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
          toolbar_mode: 'floating',
        });      
        </script>



</body>
</html>
