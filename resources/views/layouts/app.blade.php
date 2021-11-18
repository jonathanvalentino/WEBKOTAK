<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" />
    <link href="{{ url('images/image-logokotak.png') }}" rel="shortcut icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="{{ asset('themes/js/sweetalert.min.js') }}"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm f-color">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"> <img src="/images/image-logokotak.png" alt="" width="40"
                        class="d-inline-block align-text-center" /> </a>
                <a class="navbar-brand" href="{{ url('/') }}"><span class="fs-4 fw-bold" href="">Kotak</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center mr-5" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link px-3 {{ Request::is('home','/') ? 'active' : '' }}" aria-current="page"
                            href="{{ url('/') }}">Home</a>
                        <a class="nav-link px-3 {{ Request::is('pencarian') ? 'active' : '' }}"
                            href="{{ url('pencarian') }}">Pencarian</a>
                        <a class="nav-link px-3 {{ Request::is('FAQ') ? 'active' : '' }}"
                            href="{{ url('FAQ') }}">FAQ</a>
                        <a class="nav-link px-3 {{ Request::is('about') ? 'active' : '' }}"
                            href="{{ url('about') }}">About</a>
                    </div>
                </div>
                @if(!empty(Auth::user()->name))
                @if(Auth::user()->role=='user')
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle rounded-pill px-4 shd-blue" type="button"
                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ url('sewaku') }}">Sewaku</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                @elseif(Auth::user()->role=='pemilik')
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle rounded-pill px-4 shd-blue" type="button"
                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ url('pemilik') }}">Postinganku</a></li>
                        <li><a class="dropdown-item" href="{{ url('penyewa') }}">Daftar Penyewa</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                @elseif(Auth::user()->role=='admin')
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle rounded-pill px-4 shd-blue" type="button"
                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">

                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ url('user_data') }}">Data User</a></li>
                        <li><a class="dropdown-item" href="{{ url('post_data') }}">Data Postingan</a></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                @endif
                @else <a class="btn btn-primary rounded-pill px-4 shd-blue f-color text-decoration-none"
                    href="{{ url('login') }}" style="color: white">Login</a>
                @endif
            </div>
        </nav>
        @yield('content')
        @include('sweet::alert')
    </div>
</body>
<footer>
    <!-- start footer -->
    <div class="container bdr-top py-5">
        <div class="d-flex w-100 justify-content-center align-items-center">
            <a href=""><img class="px-2" src="./images/image-logo-fb.png" height="30" alt="" /></a>
            <a href=""><img class="px-2" src="./images/image-logo-ig.png" height="30" alt="" /></a>
            <img class="px-2" src="./images/image-logokotak.png" height="70" alt="" />
            <a href="https://chat.whatsapp.com/BsXqKYEOfxe4GpOyTm6J7v"><img class="px-2"
                    src="./images/image-logo-wa.png" height="30" alt="" /></a>
            <a href=""><img class="px-2" src="./images/image-logo-gh.png" height="30" alt="" /></a>
        </div>
    </div>
    <div class="container-fluid bg-color-b py-2 text-center f-color-w">
        <a>Copyright ©2021 - kotak.co</a>
    </div>
    <!-- stop footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</footer>

</html>
