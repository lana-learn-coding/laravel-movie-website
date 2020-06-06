<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <!-- Logo + search bar + login -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container">
            <div class="row w-100 no-gutters align-items-center justify-content-center justify-content-lg-start">
                <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                    <img class="w-100" src="{{ asset('img/logo.png') }}" alt="">
                </div>
                <div class="col-1 d-none d-lg-block"></div>
                <div class="col-5 d-none d-lg-block">
                    <form action="{{ route("search") }}">
                        @csrf
                        <div class="input-group input-group">
                            <input type="text" placeholder="Search movie..." class="form-control">
                            <button class="btn btn-primary input-group-append d-flex align-items-center">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="ml-auto d-none d-lg-block">
                    @include('components.nav-login')
                </div>
            </div>
        </div>
    </nav>

    <!-- Nav menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container">
            <div class="d-flex flex-nowrap w-100 d-lg-none">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <form action="{{ route("search") }}" class="d-lg-none flex-grow-1 pl-3 pl-sm-4 pl-md-5">
                    @csrf
                    <div class="input-group input-group">
                        <input type="text" placeholder="Search movie..." class="form-control searchbar__input" name="q">
                        <button class="btn btn-primary input-group-append d-flex align-items-center" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ Route::is('hot') ? 'active' : '' }}">
                            Hot Movies
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ Route::is('new') ? 'active' : '' }}">
                            New Movies
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#"
                           role="button"
                           class="nav-link dropdown-toggle {{ Route::is('categories') ? 'active' : '' }}"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                        >
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </ul>

                <!-- Right Side of Navbar -->
                <div class="d-lg-none">
                    <hr class="border-secondary my-2">
                    @include('components.nav-login')
                </div>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
