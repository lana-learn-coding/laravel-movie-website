@extends('layouts.user')

@section('content.body.user')
    <div class="mt-4 mt-md-5 mt-lg-8 mt-xl-9">
        <h4 class="text-h6 mb-2">Favorite Movies</h4>
        <v-divider></v-divider>
        @include('components.movie.movie-page', ['movies' => $favorites])
    </div>
    @if(!$rateds->isEmpty())
        <div class="mt-3 mt-md-4 mt-lg-5 mt-xl-6">
            <h4 class="text-h6 mb-2">Favorite Movies</h4>
            <v-divider></v-divider>
            <div class="row">
                @foreach($rateds as $movie)
                    <div class="col-6 col-md-4 col-xl-3 my-4">
                        <div class="hvr-grow shadow d-block">
                            @include('components.movie.movie-card', ['movie' => $movie])
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
