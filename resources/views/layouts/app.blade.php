@extends('layouts.base')

@scopedstyle('layouts.app')
<style>
    .searchbar__input {
        height: 2.1rem !important;
    }

    .navbar-nav {
        font-size: 1.1rem !important;
    }

    .nav-item .dropdown-menu {
        font-size: 1rem !important;
    }

    .nav-item .dropdown-menu.wide {
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
                <div class="col-5 d-none d-lg-block">
                    <form action="{{ route("search") }}" method="get">
                        <div class="input-group input-group">
                            <input type="text" placeholder="Search movie..." class="form-control" name="query"
                                   value="{{ request()->query('query') }}">
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
                        <input type="text" placeholder="Search movie..." class="form-control border-0 searchbar__input" name="query">
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
                            <a href="{{ route('new.release') }}"
                               class="dropdown-item {{ Route::is('new.release') ? 'active': '' }}"
                            >
                                New Release
                            </a>
                            <a href="{{ route('new.update') }}"
                               class="dropdown-item {{ Route::is('new.update') ? 'active': '' }}"
                            >
                                New Update
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown hover">
                        <a href="#"
                           role="button"
                           class="nav-link"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                        >
                            Categories
                        </a>
                        <div class="dropdown-menu">
                            @foreach($categories as $category)
                                <a class="dropdown-item {{ request()->query('category') == $category->id ? 'active' : '' }}"
                                   href="{{ route('search') . '?category=' . $category->id }}"
                                >
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown hover">
                        <a href="#"
                           role="button"
                           class="nav-link"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                        >
                            Genres
                        </a>
                        <div class="dropdown-menu wide">
                            <div class="row no-gutters">
                                @foreach($genres as $genre)
                                    <div class="col-md-4">
                                        <a class="dropdown-item {{ request()->query('genre') == $genre->id ? 'active' : '' }}"
                                           href="{{ route('search')  . '?genre=' . $genre->id }}"
                                        >
                                            {{ $genre->name }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown hover">
                        <a href="#"
                           role="button"
                           class="nav-link"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                        >
                            Languages
                        </a>
                        <div class="dropdown-menu">
                            @foreach($languages as $language)
                                <a class="dropdown-item {{ request()->query('language') == $language->id ? 'active' : '' }}"
                                   href="{{ route('search') . '?language=' . $language->id }}"
                                >
                                    {{ $language->name }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown hover">
                        <a href="#"
                           role="button"
                           class="nav-link"
                           data-toggle="dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                        >
                            Nations
                        </a>
                        <div class="dropdown-menu">
                            @foreach($nations as $nation)
                                <div class="col-md-4">
                                    <a class="dropdown-item {{ request()->query('nation') == $nation->id ? 'active' : '' }}"
                                       href="{{ route('search') . '?nation=' . $nation->id }}"
                                    >
                                        {{ $nation->name }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </li>
                </ul>

                <!-- Right Side of Navbar -->
                <div class="d-lg-none">
                    <hr class="border-light my-2">
                    @include('components.nav-login')
                </div>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
@endsection
