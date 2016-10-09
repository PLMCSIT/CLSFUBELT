<!DOCTYPE HTML>
<html class="no-js">
<head>
    <!-- Basic Page Needs
      ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>CLSF - UBelt</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Meta
      ================================================== -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- CSS
      ================================================== -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="plugins/mediaelement/mediaelementplayer.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="plugins/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
    <!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="css/ie8.css" media="screen" /><![endif]-->

    <!-- Modal -->
    <link href="css/modal.css" rel="stylesheet">

    <!-- Color Style -->
    <link class="alt" href="colors/color1.css" rel="stylesheet" type="text/css">
    <link href="style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
    <!-- SCRIPTS
      ================================================== -->
    <script src="js/modernizr.js"></script><!-- Modernizr -->
</head>
<body>
<div class="body">
    <!-- Start Site Header -->
    <header class="site-header">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-8">
                        <h1 class="logo"> <a href="index.html"><img src="images/logo.png" alt="CLSF LOGO"></a> </h1>
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-4">
                        <a href="#" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a> </div>
                </div>
            </div>
        </div>
        <div class="main-menu-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navigation">
                            <ul class="sf-menu">
                                <li><a href="{{ url('home') }}">Home</a></li>
                                <li><a href="{{ url('event') }}">Events</a></li>
                                <li><a href="#">About Us</a>
                                <ul class="dropdown">
                                    <li><a href="{{ url('about') }}">Overview</a></li>
                                    <li><a href="{{ url('vision') }}">Mission and Vision</a></li>
                                    <li><a href="{{ url('history') }}">History</a></li>
                                    <li><a href="{{ url('contact') }}">Contact Us</a></li>
                                    <li><a href="{{ url('location') }}">Location</a></li>
                                </ul>
                                </li>
                                @if(Auth::guest())
                                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                                @else
                                @if(Entrust::hasRole(['Owner', 'Admin', 'Leader']))
                                    <li><a href="{{ url('/dashboard')}}"> Dashboard</a></li>
                                @endif
                                    <li><a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"> Logout</a></li>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Site Header -->
    <!-- Start Hero Slider -->
    <div class="hero-slider flexslider clearfix" data-autoplay="yes" data-pagination="yes" data-arrows="yes" data-style="fade" data-pause="yes">
        <ul class="slides">
            <li class=" parallax" style="background-image:url(images/slide1.jpg);"></li>
            <li class="parallax" style="background-image:url(images/slide2.jpg);"></li>
        </ul>
    </div>
    <!-- End Hero Slider -->
    <!-- Start Notice Bar -->
    <div class="notice-bar">
        <div class="container">
            <div class="row">
                <?php

                        $getLatestEvent = DB::table('events')->where('deleted_at', null)->orderBy('event_date')->take(1)->get();
                        if(!empty($getLatestEvent[0])){
                        $getEvent = $getLatestEvent[0];
                        switch($getEvent->event_month)
                        {
                            case 'JAN':
                            $month = "January";
                            break;
                            case 'FEB':
                            $month = "February";
                            break;
                            case 'MAR':
                            $month = "March";
                            break;
                            case 'APR':
                            $month = "April";
                            break;
                            case 'MAY':
                            $month = "May";
                            break;
                            case 'JUN':
                            $month = "June";
                            break;
                            case 'JUL':
                            $month = "July";
                            break;
                            case 'AUG':
                            $month = "August";
                            break;
                            case 'SEP':
                            $month = "September";
                            break;
                            case 'OCT':
                            $month = "October";
                            break;
                            case 'NOV':
                            $month = "November";
                            break;
                            case 'DEC':
                            $month = "December";
                            break;
                        }
                        $event = $getEvent->event_title;
                        $day = $getEvent->event_day;
                        $year = $getEvent->event_year;
                        $date = $month." ".$day.", ".$year;
                        }
                    ?>

                @if(!empty($getLatestEvent[0]))
                    <div class="col-md-3 col-sm-6 col-xs-6 notice-bar-title"> <span class="notice-bar-title-icon hidden-xs"><i class="fa fa-calendar fa-3x"></i></span> <span class="title-note">Next</span> <strong>Upcoming Event</strong> </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 notice-bar-event-title">


                    <h5><a href="#">{{$event}}</a></h5>
                    <span class="meta-data">{{$date}}</span> </div>
               
                <div id="counter" class="col-md-4 col-sm-6 col-xs-12 counter" data-date="{{$date}}">
                    <div class="timer-col"> <span id="days"></span> <span class="timer-type">days</span> </div>
                    <div class="timer-col"> <span id="hours"></span> <span class="timer-type">hrs</span> </div>
                    <div class="timer-col"> <span id="minutes"></span> <span class="timer-type">mins</span> </div>
                    <div class="timer-col"> <span id="seconds"></span> <span class="timer-type">secs</span> </div>
                </div>
                <div class="col-md-2 col-sm-6 hidden-xs"> <a href="{{url('event')}}" class="btn btn-primary btn-lg btn-block">All Events</a> </div>
                @endif
            </div>
        </div>
    </div>
    <!-- End Notice Bar -->

    @yield('content')

<!-- Start Featured Gallery -->
    <div class="featured-gallery">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3">
                    <h4>Updates from our gallery</h4>
                    <a href="#" class="btn btn-default btn-lg">More Galleries</a> </div>
                <div class="col-md-3 col-sm-3 post format-image"> <a href="images/gallery-img1.jpg" class="media-box" data-rel="prettyPhoto[Gallery]"> <img src="images/gallery-img1.jpg" alt=""> </a> </div>
                <div class="col-md-3 col-sm-3 post format-video"> <a href="http://youtu.be/NEFfnbQlGo8" class="media-box" data-rel="prettyPhoto[Gallery]"> <img src="images/gallery-img2.jpg" alt=""> </a> </div>
                <div class="col-md-3 col-sm-3 post format-image"> <a href="images/gallery-img3.jpg" class="media-box" data-rel="prettyPhoto[Gallery]"> <img src="images/gallery-img3.jpg" alt=""> </a> </div>
            </div>
        </div>
    </div>
    <!-- End Featured Gallery -->
    <!-- Start Footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <!-- Start Footer Widgets -->
                <div class="col-md-4 col-sm-4 widget footer-widget">
                    <h4 class="footer-widget-title">About our Church</h4>
                    <img src="images/logo.png" alt="Logo">
                    <div class="spacer-20"></div>
                    <p align="justify">
                    From its humble beginnings as a campus ministry in the 70’s, otherwise known as the Jesus People Movement, Christ, the Living Stone Fellowship blossomed into a nationwide ministry with more than 100 daughter churches throughout the Philippine archipelago. And in recent years, it initiated significant efforts to reach out several parts of Asia and North America. Hence, for the more than two decades since it became a formal church 
                    organization, CLSF had not only experienced tremendous church and ministerial growth but also found its right place in the Body of Christ. And as the country is facing the most challenging period of its entire existence, CLSF, through its newly-commissioned Justice, Faith, and Mercy ministries, is more than ready to stand in the gap.
                    </p>
                </div>
                <div class="col-md-4 col-sm-4 widget footer-widget">
                    <h4 class="footer-widget-title">Blogroll</h4>
                    <ul>
                        <li><a href="{{url('home')}}">Church Home</a></li>
                        <li><a href="{{url('about')}}">About Us</a></li>
                        <li><a href="{{url('event')}}">All Events</a></li>
                        <li><a href="{{url('location')}}">Where to find us?</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <footer class="site-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="copyrights-col-left col-md-6 col-sm-6">
                    <p>&copy; CLSF UBelt. All Rights Reserved</p>
                </div>
                <div class="copyrights-col-right col-md-6 col-sm-6">
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>
</div>
<script src="js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call -->
<script src="plugins/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin -->
<script src="js/helper-plugins.js"></script> <!-- Plugins -->
<script src="js/bootstrap.js"></script> <!-- UI -->
<script src="js/waypoints.js"></script> <!-- Waypoints -->
<script src="plugins/mediaelement/mediaelement-and-player.min.js"></script> <!-- MediaElements -->
<script src="js/init.js"></script> <!-- All Scripts -->
<script src="plugins/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
<script src="plugins/countdown/js/jquery.countdown.min.js"></script> <!-- Jquery Timer -->
<script src="style-switcher/js/jquery_cookie.js"></script>
<script src="style-switcher/js/script.js"></script>
<!-- Modal -->

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Login Member</h1><br>
            <form role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">Email Address</label>

                            <div>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>

                            <div>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                             </div>
                             <div class="col-md-8">
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                             </div>
                        </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>