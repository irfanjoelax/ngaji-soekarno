<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset(env('APP_LOGO')) }}" type="image/x-icon">

    <!-- Script Mix -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />

    <!-- Custom Style -->
    <style>
        .btn-primary {
            color: white !important;
        }
    </style>
    @yield('style')
</head>

<body class="sb-nav-fixed bg-light">
    <nav class="sb-topnav navbar navbar-expand navbar-white bg-white">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3 text-primary fw-bold" href="#">{{ env('APP_NAME') }}</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm rounded-circle shadow order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"
            href="#!">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle {{ Request::is('profile') ? 'bg-primary text-white rounded' : '' }}"
                    id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                    <span class="ml-2 d-none d-md-inline-block">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                            <i class="fa-solid fa-gear"></i>
                            <span class="ms-1">Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <span class="ms-1">Log out</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion bg-white" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading text-muted">Navigation</div>
                        <a class="nav-link {{ Request::is('home') ? 'bg-primary text-white' : '' }}"
                            href="{{ route('home') }}">
                            <i class="fa-solid fa-house"></i>
                            <span class="ms-2">Home</span>
                        </a>
                        <a class="nav-link" href="{{ url('/') }}" target="_blank">
                            <i class="fa-solid fa-globe"></i>
                            <span class="ms-2">Kunjungi Website</span>
                        </a>
                        <div class="sb-sidenav-menu-heading text-muted">Your Post</div>
                        <a class="nav-link {{ Request::is('post?category=artikel/*') ? 'bg-primary text-white' : '' }}"
                            href="{{ route('post.index', ['category' => 'artikel']) }}">
                            <i class="fa-solid fa-newspaper"></i>
                            <span class="ms-2">Artikel</span>
                        </a>
                        <a class="nav-link {{ Request::is('post?category=buletin/*') ? 'bg-primary text-white' : '' }}"
                            href="{{ route('post.index', ['category' => 'buletin']) }}">
                            <i class="fa-solid fa-file-image"></i>
                            <span class="ms-2">Buletin</span>
                        </a>
                        <a class="nav-link {{ Request::is('post?category=info/*') ? 'bg-primary text-white' : '' }}"
                            href="{{ route('post.index', ['category' => 'info']) }}">
                            <i class="fa-solid fa-file-circle-exclamation"></i>
                            <span class="ms-2">Info</span>
                        </a>
                        <div class="sb-sidenav-menu-heading text-muted">Setting</div>
                        <a class="nav-link {{ Request::is('information') ? 'bg-primary text-white' : '' }}"
                            href="{{ route('information.index') }}">
                            <i class="fa-solid fa-cog"></i>
                            <span class="ms-2">Informasi Kontak</span>
                        </a>
                    </div>
                </div>
                {{-- <div class="sb-sidenav-footer">
                    <div class="small text-muted">Logged in as:</div>
                    <span class="fw-semibold">
                        {{ Str::upper(Auth::user()->role) }}
                    </span>
                </div> --}}
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main class="container-fluid p-lg-4 p-3">
                @yield('content')
            </main>

            <footer class="py-4 bg-white mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div class="text-muted">
                            Powered by <strong class="text-primary">{{ env('APP_COPYRIGHT') }}</strong> &copy;
                            {{ date('Y') }}
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Modal Logout -->
    <x-modal-confirm id="logoutModal" text="Are you sure for logout from this application ?"
        url="{{ route('logout') }}" />

    <!-- Scripts -->
    @yield('script')
    @include('sweetalert::alert')
</body>

</html>
