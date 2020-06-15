@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @yield('content.header')
        <div class="row">
            <div class="col-md-8 col-xl-9">
                @yield('content.body')
                <div>
                    <h5 class="mt-4 mb-2">New Updated</h5>
                    <hr class="border-primary mt-2">
                    <div class="row overflow-hidden flex-nowrap pb-3 mb-4 mb-lg-5">
                        @foreach($news as $movie)
                            <div class="col-6 col-sm-4 col-lg-3">
                                @include('components.movie.movie-card', ['movie' => $movie])
                            </div>
                        @endforeach
                    </div>
                </div>
                @yield('content.after')
            </div>
            <div class="col-md-4 col-xl-3">
                <h5 class="mb-2">Hot Movies</h5>
                <hr class="border-primary mt-2">
                @include('components.movie.side-movie-list', ['movies' => $hots])
            </div>
        </div>
    </div>
@endsection
