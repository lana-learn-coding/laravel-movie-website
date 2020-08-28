@extends('layouts.app')

@section('content')
    <div class="container mt-4 mt-lg-5">
        <div class="w-100 text-center">
            <h4 class="text-center d-inline mt-0">Featured Movies</h4>
            <hr class="border-info mt-1">
        </div>
        <div class="row overflow-hidden flex-nowrap pb-3 mb-3 mb-lg-4">
            @foreach($features as $movie)
                <div class="col-6 col-sm-4 col-md-3 col-xl-2">
                    <div class="hvr-bubble-float-top d-block">
                        @include('components.movie.movie-card', ['movie' => $movie])
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-8 col-xl-9">
                <h4 class="mb-2">New Updated</h4>
                <hr class="border-info mt-2 mb-0">
                <div class="row">
                    @foreach($news as $movie)
                        <div class="col-6 col-md-4 col-xl-3 my-4">
                            <div class="hvr-grow shadow d-block">
                                @include('components.movie.movie-card', ['movie' => $movie])
                            </div>
                        </div>
                    @endforeach
                </div>
                <h4 class="mb-2 mt-2 mt-md-3">New Released</h4>
                <hr class="border-info mt-2 mb-0">
                <div class="row">
                    @foreach($releases as $movie)
                        <div class="col-6 col-md-4 col-xl-3 my-4">
                            <div class="hvr-grow shadow d-block">
                                @include('components.movie.movie-card', ['movie' => $movie])
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <h4 class="mb-2"> Hot movies </h4>
                <hr class="border-info mt-2">
                @include('components.movie.side-movie-list', ['movies' => $hots])
            </div>
        </div>
    </div>
@endsection
