
<!DOCTYPE html>
<html>
<head>
    <!-- Site made with Mobirise Website Builder v3.12.1, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <title>TicTacToe Game - demo webapp</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('bootstrap-material-design-font/css/material.css') }}">
    <link rel="stylesheet" href="{{ asset('et-line-font-plugin/style.css') }}">
    <link rel="stylesheet" href="{{ asset('tether/tether.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dropdown/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('socicon/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mobirise/css/mbr-additional.css') }}" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<a id="home"></a>
<section id="ext_menu-0">

    <nav class="navbar navbar-dropdown navbar-fixed-top">
        <div class="container">

            <div class="mbr-table">
                <div class="mbr-table-cell">
                    <div class="navbar-brand">
                        <a href="{{ url('/') }}" class="navbar-logo"><img src="{{ asset('images/logo.png') }}" alt="Mobirise"></a>
                        <a class="navbar-caption" href="{{ url('/') }}">TIC-TAC-TOE GAME</a>
                    </div>
                </div>
                <div class="mbr-table-cell">

                    <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="hamburger-icon"></div>
                    </button>

                    <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
                        <li class="nav-item"><a class="nav-link link" href="#about">ABOUT</a></li>
                        <li class="nav-item"><a class="nav-link link" href="#help">HELP</a></li>
                        <li class="nav-item"><a class="nav-link link" href="#contact">CONTACT</a></li>
                        @if(Auth::guest())
                            <li class="nav-item nav-btn"><a class="nav-link btn btn-white btn-white-outline" href="{{ route('login') }}">PLAY</a></li>
                        @else
                            <li class="nav-item nav-btn">
                                <a class="nav-link btn btn-white btn-white-outline" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">LOGOUT</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                    <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

                </div>
            </div>

        </div>
    </nav>

</section>

<section class="engine"><a rel="external" href="#">https://mobirise.com/</a></section>
<section class="mbr-section mbr-section-hero mbr-section-full header2 mbr-parallax-background mbr-after-navbar" id="header2-1" style="background-image: url({{ asset('images/landscape.jpg') }});">

    <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(0, 0, 0);">
    </div>

    <div class="mbr-table mbr-table-full">
        <div class="mbr-table-cell">

            <div class="container">
                <div class="mbr-section row">
                    <div class="mbr-table-md-up">

                        <div class="mbr-table-cell col-md-5 content-size text-xs-center text-md-right">

                            <h3 class="mbr-section-title display-2">TIC-TAC-TOE GAME</h3>

                            <div class="mbr-section-text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            </div>

                            <div class="mbr-section-btn"><a class="btn btn-primary" href="{{ route('login') }}">PLAY</a></div>

                        </div>
                        <div class="mbr-table-cell mbr-valign-top mbr-left-padding-md-up col-md-7 image-size" style="width: 50%;">
                            <div class="mbr-figure"><img src="{{ asset('images/coworkers.jpg') }}"></div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="mbr-arrow mbr-arrow-floating hidden-sm-down" aria-hidden="true"><a href="#features4-2"><i class="mbr-arrow-icon"></i></a></div>

</section>

<section class="mbr-cards mbr-section mbr-section-nopadding" id="features4-2" style="background-color: rgb(255, 255, 255);">


    <a id="about"></a>
    <div class="mbr-cards-row row">
        <div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><a href="#" class="etl-icon icon-phone mbr-iconfont mbr-iconfont-features4" style="color: black;"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">TIC</h4>
                        <h5 class="card-subtitle">Lorem ipsum dolor sit amet</h5>
                        <p class="card-text">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><a href="#" class="etl-icon icon-edit mbr-iconfont mbr-iconfont-features4" style="color: black;"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">TAC</h4>
                        <h5 class="card-subtitle">Lorem ipsum dolor sit amet</h5>
                        <p class="card-text">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-cards-col col-xs-12 col-lg-4" style="padding-top: 80px; padding-bottom: 80px;">
            <div class="container">
                <div class="card cart-block">
                    <div class="card-img iconbox"><a href="#" class="etl-icon icon-briefcase mbr-iconfont mbr-iconfont-features4" style="color: black;"></a></div>
                    <div class="card-block">
                        <h4 class="card-title">TOE</h4>
                        <h5 class="card-subtitle">Lorem ipsum dolor sit amet</h5>
                        <p class="card-text">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<a id="help"></a>
<section class="mbr-section article mbr-parallax-background" id="msg-box8-3" style="background-image: url({{ asset('images/desert.jpg') }}); padding-top: 120px; padding-bottom: 120px;">

    <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(34, 34, 34);">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">TIC-TAC-TOE GAME</h3>
                <div class="lead"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
            </div>
        </div>
    </div>

</section>

<section class="mbr-info mbr-section mbr-section-md-padding" id="msg-box2-5" style="background-color: rgb(46, 46, 46); padding-top: 90px; padding-bottom: 90px;">


    <div class="container">
        <div class="row">

            <div class="mbr-table-md-up">
                <div class="mbr-table-cell col-md-4">
                    <div class="text-xs-center"><a class="btn btn-primary" href="{{ route('register') }}">REGISTER AND PLAY</a></div>
                </div>
                <div class="mbr-table-cell mbr-right-padding-md-up col-md-8 text-xs-center text-md-left">
                    <h3 class="mbr-info-title mbr-section-title display-2">REGISTER AND PLAY</h3>
                    <h2 class="mbr-info-subtitle mbr-section-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h2>
                </div>
            </div>



        </div>
    </div>
</section>

<section class="mbr-section mbr-section-md-padding" id="social-buttons1-6" style="background-color: rgb(255, 255, 255); padding-top: 90px; padding-bottom: 90px;">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-xs-center">
                <h3 class="mbr-section-title display-2">SHARE THIS PAGE!</h3>
                <div>
                    <div class="mbr-social-likes" data-counters="false">
                    <span class="btn btn-social facebook" title="Share link on Facebook">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </span>
                    <span class="btn btn-social twitter" title="Share link on Twitter">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </span>
                    <span class="btn btn-social plusone" title="Share link on Google+">
                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section mbr-section-md-padding mbr-footer footer1" id="contacts1-7" style="background-color: rgb(46, 46, 46); padding-top: 90px; padding-bottom: 90px;">

    <a id="contact"></a>
    <div class="container">
        <div class="row">
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <div><img width="128px" src="{{ asset('images/logo.png') }}"></div>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Address</strong><br>
                    1234 Street Name<br>
                    City, ST 99999</p>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Contacts</strong><br>
                    Email: support@tictactoe.app<br>
                    </p>
            </div>
            <div class="mbr-footer-content col-xs-12 col-md-3">
                <p><strong>Links</strong><br>
                    <a class="text-primary" href="#">TicTacToe.app Company Inc.</a>
            </div>

        </div>
    </div>
</section>

<script src="{{ asset('web/assets/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('tether/tether.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('smooth-scroll/smooth-scroll.js') }}"></script>
<script src="{{ asset('dropdown/js/script.min.js') }}"></script>
<script src="{{ asset('touch-swipe/jquery.touch-swipe.min.js') }}"></script>
<script src="{{ asset('viewport-checker/jquery.viewportchecker.js') }}"></script>
<script src="{{ asset('jarallax/jarallax.js') }}"></script>
<script src="{{ asset('social-likes/social-likes.j') }}s"></script>
<script src="{{ asset('theme/js/script.js') }}"></script>

<input name="animation" type="hidden">
</body>
</html>