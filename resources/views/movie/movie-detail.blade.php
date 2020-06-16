@extends('layouts.movie')

@section('content.movie')
    <div class="row">
        <div class="col-md-5 col-lg-4">
            @include('components.movie.movie-card', ['movie' => $movie])
        </div>
        <div class="col-md-7 col-lg-8 mt-2 mt-md-0">
            <div class="card h-100">
                <div class="card-body card-font-size-lg d-flex flex-column justify-content-between">
                    <div>
                        <div class="mb-2">
                            <span class="font-weight-bold mr-2">Release: </span>
                            <span>{{ $movie->release_date ?: 'unknown' }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold mr-2">Episodes: </span>
                            <span>{{ $movie->number_of_episodes ?: 'updating' }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold mr-2">Categories: </span>
                            <span>{{ $movie->number_of_episodes ?: 'updating' }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold mr-2">Genres: </span>
                            <span>{{ $movie->number_of_episodes ?: 'updating' }}</span>
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-warning px-3" href="{{ route('movie.watch',['id' => $movie->id]) }}">
                            <i class="fas fa-play-circle mr-1"></i>
                            <span class="font-weight-bold">Watch Now</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Movie Plot</h5>
            <h6 class="card-subtitle mb-3 text-muted">{{ $movie->name }}</h6>
            <p class="card-text">{{ $movie->description }}</p>
        </div>
    </div>
@endsection
