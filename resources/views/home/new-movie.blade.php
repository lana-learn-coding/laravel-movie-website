@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 col-xl-9">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('new.release') ? 'active' : '' }} text-nowrap"
                           href="{{ route('new.release') }}">
                            <span> Newly Released </span>
                            <span class="d-none d-md-inline">Movies</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('new.update') ? 'active' : '' }}"
                           href="{{  route('new.update') }}">
                            <span> Newly Added </span>
                            <span class="d-none d-md-inline">Movies</span>
                        </a>
                    </li>
                </ul>
                <div class="mt-4">
                    <h5 class="mb-1">New movies by {{ $by }}</h5>
                    <hr class="mt-1 border-primary">
                </div>
                @include('components.movie.movie-page', ['movies' => $movies])
            </div>
            <div class="col-md-4 col-xl-3">
                <h5 class="mb-2">Hot movies by day</h5>
                <hr class="border-primary mt-2">
                @include('components.movie.side-movie-list', ['movies' => $hots])
            </div>
        </div>
    </div>
@endsection
