<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('meta-title', 'Home - FOECHS')</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">
    <meta name="description" content="@yield('meta-description', '')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/responsive.css') }}">

    <script src="{{ asset('site/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
</head>

<body id="home">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


    <header>

        <div class="topbar">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-sm-4 col-md-6">
                        <div class="welcome-area">
                            <p>Last updated: {{ $settings['updated'] }}</p>
                        </div>
                    </div>

                    <div class="col-sm-8 col-md-6">
                        <div class="social-area">
                            <ul>
                                <li>Follow Us on: </li>
                                <li><a href="{{ $settings['facebook'] }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $settings['twitter'] }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $settings['youtube'] }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <li class="directions"><a href="{{ $settings['map_location'] }}" target="_blank">Location Map</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <nav class="navbar navbar-main" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ url('/') }}">
                    <img src="{{ asset('site/img/logo-updated.svg') }}" class="img-responsive logo" alt="logo">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="{{ route('organization') }}">Organization
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('rules-regulations') }}">Rules & Regulations</a></li>
                            <li><a href="{{ route('noc') }}">NOC</a></li>
                            <li><a href="{{ route('master-plan') }}">Master Plan</a></li>
                            <li><a href="{{ route('management-committee') }}">Management Committee</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('gallery') }}">Gallery</a></li>
                    <li><a href="{{ route('events') }}">Events</a></li>
                    <li><a href="{{ route('updates') }}">Recent Updates</a></li>
                    <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>


        <nav class="navbar navbar-secondary" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex2-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex2-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('forms-documents') }}">Forms & Documents</a></li>
                    <li><a href="{{ route('transfer-process') }}">Transfer Process</a></li>
                    <li><a href="{{ route('possession-process') }}">Possession Process</a></li>
                    <li><a href="{{ route('construction-house') }}">Construction of House</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>



    </header>

    <div class="clearfix"></div>

    <div class="mainbody">

        @yield('content')

    </div>

    <div class="clearfix"></div>

    <footer>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-md-4">
                    <div class="item">
                        <img src="{{ asset('site/img/logo.svg') }}" class="img-responsive" alt="footer logo">
                        <p>{{ $settings['footer_intro'] }}</p>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4">
                    <div class="item">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="{{ route('organization') }}">About Us</a></li>
                            <li><a href="{{ route('master-plan') }}">Master Plan</a></li>
                            <li><a href="{{ route('management-committee') }}">Management Committee</a></li>
                            <li><a href="{{ route('forms-documents') }}">Forms & Documents</a></li>
                            <li><a href="{{ route('updates') }}">Latest Updates</a></li>
                            <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-4 col-md-4">
                    <div class="item">
                        <h4>Contact Info</h4>
                        <ul>
                            <li>Address: {{ $settings['address'] }}</li>
                            <li>Email: <a href="mailto:{{ $settings['email'] }}">{{ $settings['email'] }}</a></li>
                            <li>Phone: <a href="tel:{{ $settings['phone'] }}">{{ $settings['phone'] }}</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </footer>


    <script src="{{ asset('site/js/vendor/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ asset('site/js/vendor/bootstrap.min.js') }}"></script>
    <!-- Plugin JavaScript -->
    <script src="{{ asset('site/js/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('site/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('site/js/popup.js') }}"></script>
    <script src="{{ asset('site/js/main.js') }}"></script>
</body>

</html>
