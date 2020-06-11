@extends('layouts.app')

@section('content')
    <div class="container mt-4 mt-lg-5">
        <div class="w-100 text-center">
            <h5 class="text-center d-inline mt-0">Featured Movies</h5>
            <hr class="border-primary mt-1">
        </div>
        <div class="row overflow-hidden flex-nowrap pb-3 mb-4 mb-lg-5">
            @foreach($features as $movie)
                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    @include('components.movie.movie-card', ['movie' => $movie])
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-8 col-xl-9">
                <h5 class="mb-2">New Updated</h5>
                <hr class="border-primary mt-2">
                <div class="row">
                    @foreach($news as $movie)
                        <div class="col-6 col-md-4 col-xl-3 my-4">
                            @include('components.movie.movie-card', ['movie' => $movie])
                        </div>
                    @endforeach
                </div>
                <h5 class="mb-2 mt-5">Other Movies</h5>
                <hr class="border-primary mt-2">
                <div class="row">
                    @foreach($random as $movie)
                        <div class="col-6 col-md-4 col-xl-3 my-4">
                            @include('components.movie.movie-card', ['movie' => $movie])
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <h5 class="mb-2"> Hot movies </h5>
                <hr class="border-primary mt-2">
                @include('components.movie.side-movie-list', ['movies' => $hots])
            </div>
        </div>
    </div>
@endsection
