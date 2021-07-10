<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Reveal Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('user/img/favicon.png')}}" rel="icon">
    <link href="{{asset('user/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('user/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('backend/modules/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/modules/fontawesome/css/all.css')}}" rel="stylesheet">
    <link href="{{asset('backend/modules/fontawesome/css/brands.css')}}" rel="stylesheet">
    <link href="{{asset('backend/modules/fontawesome/css/fontawesome.css')}}" rel="stylesheet">
    <link href="{{asset('backend/modules/fontawesome/css/solid.css')}}" rel="stylesheet">
    <link href="{{asset('user/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('user/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('user/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('user/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">



    <!-- Template Main CSS File -->
    <link href="{{asset('user/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('user/css/app.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Reveal - v4.3.0
  * Template URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a
                        href="mailto:contact@example.com">contact@example.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section><!-- End Top Bar-->

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between">

            <div id="logo">
                {{-- <h1><a href="index.html">Reve<span>al</span></a></h1> --}}
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="/"><img src="{{asset('user/img/logo.png')}}" class="navbar-logo" alt="Logo Bantu Gerak"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#intro">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#campaign">Campaign</a></li>
                    <li><a class="nav-link scrollto" href="#program">Program</a></li>
                    <li><a class="nav-link scrollto " href="#publikasi">Publikasi</a></li>
                    @auth
                    <li class="dropdown"><a href="#"><span>Akun</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li>
                            @if(auth()->user()->role=='user')
                                <a href="#">User Dashboard</a>
                            @else
                                <a href="{{route('admin.dashboard.index')}}">Dashboard</a>
                            @endif
                            </li>
                            <hr>
                            <li><a href="{{route('logout')}}">Logout</a></li>
                        </ul>
                    </li>
                    @endauth

                    @guest

                    <li class="dropdown"><a href="#"><span>Akun</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{route('login')}}">Login</a></li>
                            <hr>
                            <li><a href="{{route('register')}}">Register</a></li>
                        </ul>
                    </li>
                    @endguest
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
