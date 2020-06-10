@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 col-xl-9">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('hot') ? 'active' : '' }} text-nowrap"
                           href="{{ route('hot') }}">
                            <span> All Time </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('hot.day') ? 'active' : '' }}"
                           href="{{  route('hot.day') }}">
                            <span> By Day </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('hot.week') ? 'active' : '' }}"
                           href="{{  route('hot.week') }}">
                            <span> By Week </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('hot.month') ? 'active' : '' }}"
                           href="{{  route('hot.month') }}">
                            <span> By Month </span>
                        </a>
                    </li>
                </ul>
                <div class="mt-4">
                    <h5 class="mb-1">Most Viewed by {{ $by }}</h5>
                    <hr class="mt-1 border-primary">
                </div>
                @include('components.movie.movie-page', ['movies' => $movies])
            </div>
            <div class="col-md-4 col-xl-3">
                <h5 class="mb-2">Newly Updated Movies</h5>
                <hr class="border-primary mt-2">
                @include('components.movie.side-movie-list', ['movies' => $updates])
            </div>
        </div>
    </div>
@endsection
