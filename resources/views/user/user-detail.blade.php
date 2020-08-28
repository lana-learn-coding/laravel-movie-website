@extends('layouts.user')

@section('content.body.user')
    <div class="mt-4">
        <h4 class="mb-2">Favorite Movies</h4>
        <hr class="border-info mt-2 mb-0">
        @include('components.movie.movie-page', ['movies' => $favorites])
    </div>
    @if(!$rateds->isEmpty())
        <div class="mt-4">
            <h4 class="mb-2">Recently Rated</h4>
            <hr class="border-info mt-2 mb-0">
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
