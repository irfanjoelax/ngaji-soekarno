<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>{{ env('APP_NAME') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset(env('APP_LOGO')) }}" type="image/x-icon">

    <!-- Stylesheet -->
    <link href="{{ asset('newsbox/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="newsbox-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="newsboxNav">

                        <!-- Nav brand -->
                        <a href="{{ url('/') }}" class="d-inline-flex">
                            <h3 class="text-danger">{{ env('APP_NAME') }}</h3>
                        </a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li class="mr-lg-4 mr-0"><a href="{{ route('welcome') }}">Beranda</a></li>
                                    <li class="mr-lg-4 mr-0"><a
                                            href="{{ route('all.post', ['category' => 'artikel']) }}">Artikel</a></li>
                                    <li class="mr-lg-4 mr-0"><a
                                            href="{{ route('all.post', ['category' => 'buletin']) }}">Buletin</a></li>
                                    <li class="mr-lg-4 mr-0"><a
                                            href="{{ route('all.post', ['category' => 'info']) }}">Info</a></li>
                                    <li class="mr-lg-4 mr-0"><a href="{{ route('contact') }}">Kontak</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    @yield('content')

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <!-- Footer Logo -->
        <div class="footer-logo mb-3">
            <a href="{{ url('/') }}"><img src="{{ asset('img/logo.svg') }}" width="50"></a>
        </div>
        <!-- Footer Content -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content text-center">
                        <!-- Copywrite Text -->
                        <p class="copywrite-text">
                            Powered by &copy; {{ date('Y') }} All rights reserved <a
                                href="https://wa.me/+6283140617623" target="_blank"
                                class="text-danger">{{ env('APP_COPYRIGHT') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{ asset('newsbox/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('newsbox/js/bootstrap/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('newsbox/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- All Plugins js -->
    <script src="{{ asset('newsbox/js/plugins/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('newsbox/js/active.js') }}"></script>
</body>

</html>
