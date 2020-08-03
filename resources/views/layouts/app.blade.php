@extends('layouts.base.app-base')

@scopedstyle('layouts.app')
<style>
    .searchbar__input-small {
        height: 2.1rem !important;
    }

    .searchbar__input-large {
        height: 2.5rem !important;
        font-size: 1.1rem;
        font-weight: 500;
    }

    .navbar-nav {
        font-size: 1.1rem !important;
    }

    .nav-item .dropdown-menu {
        font-size: 1rem !important;
    }

    .nav-item .dropdown-menu .row.wide {
        width: 600px;
    }

    .dropdown.hover:hover > .dropdown-menu {
        display: block;
    }
</style>
@endscopedstyle

@section('body')
    <!-- Logo + search bar + login -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container">
            <div class="row w-100 no-gutters align-items-center justify-content-center justify-content-lg-start">
                <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                    <img class="w-100" src="{{ asset('img/logo.png') }}" alt="">
                </div>
                <div class="col-1 d-none d-lg-block"></div>
                <div class="col-6 d-none d-lg-block">
                    <form action="{{ route("search") }}" method="get">
                        <div class="input-group">
                            <input type="text" placeholder="Search movie..." class="form-control border-0 searchbar__input-large" name="query"
                                   value="{{ request()->query('query') }}">
                            <button class="btn btn-primary input-group-append d-flex align-items-center px-3">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="ml-auto d-none d-lg-block">
                    @include('components.app.nav-login')
                </div>
            </div>
        </div>
    </nav>

    <!-- Nav menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow">
        <div class="container">
            <div class="d-flex flex-nowrap w-100 d-lg-none align-items-center">
                <button class="navbar-toggler"
                        type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <form action="{{ route("search") }}" class="d-lg-none flex-grow-1 pl-3 pl-sm-4 pl-md-5">
                    @csrf
                    <div class="input-group">
                        <input type="text" placeholder="Search movie..." class="form-control border-0 searchbar__input-small"
                               name="query">
                        <button class="btn btn-info input-group-append d-flex align-items-center" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarSupportedContent">
                <hr class="d-lg-none border-light">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('hot') }}" class="nav-link {{ Route::is('hot*') ? 'active' : '' }}">
                            Hot Movies
                        </a>
                    </li>
                    <li class="nav-item dropdown hover">
                        <a href="{{ route('new') }}"
                           class="nav-link {{ Route::is('new.*') ? 'active' : '' }}"
                        >
                            New Movies
                        </a>
                        <div class="dropdown-menu">
                            <a href="{{ route('new.released') }}"
                               class="dropdown-item {{ Route::is('new.released') ? 'active': '' }}"
                            >
                                New Released
                            </a>
                            <a href="{{ route('new.created') }}"
                               class="dropdown-item {{ Route::is('new.released') ? 'active': '' }}"
                            >
                                New Added
                            </a>
                            <a href="{{ route('new.updated') }}"
                               class="dropdown-item {{ Route::is('new.updated') ? 'active': '' }}"
                            >
                                New Updated
                            </a>
                        </div>
                    </li>
                    @include('components.app.nav-dropdown', ['name' => 'Categories', 'type' => 'category', 'items' => $categories])
                    @include('components.app.nav-dropdown', ['name' => 'Genres', 'type' => 'genres', 'items' => $genres])
                    @include('components.app.nav-dropdown', ['name' => 'Languages', 'type' => 'language', 'items' => $languages])
                    @include('components.app.nav-dropdown', ['name' => 'Nations', 'type' => 'nation', 'items' => $nations])
                    <li class="nav-item">
                        <a href="{{ route('cast') }}" class="nav-link {{ Route::is('cast') ? 'active' : '' }}">Casts</a>
                    </li>
                </ul>

                <!-- Right Side of Navbar -->
                <div class="d-lg-none">
                    <hr class="border-light my-2">
                    @include('components.app.nav-login')
                </div>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
@endsection
