@extends('layouts.movie')

@section('content.movie')
    <div class="row">
        <div class="col-md-5 col-lg-4 d-flex">
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
                            <span class="font-weight-bold mr-2">Language: </span>
                            <span>{{ $movie->language ? $movie->language->name : 'updating' }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold mr-2">Nation: </span>
                            <span>{{ $movie->nation ? $movie->nation->name : 'updating' }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold mr-2">Category: </span>
                            <span>{{ $movie->category ? $movie->category->name : 'updating' }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold mr-2">Genres: </span>
                            @if($movie->genres && $movie->genres->isEmpty())
                                <span>none</span>
                            @else
                                @foreach($movie->genres as $genre)
                                    <span class="mr-1">{{ $genre->name }},</span>
                                @endforeach
                            @endif
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold mr-2">Views: </span>
                            <span>{{ $movie->views_count_by_all_time ?: 0 }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold mr-2">Rating: </span>
                            <span class="small">
                                @for($i = 0; $i < 5; $i++)
                                    <i class="fas fa-star {{$i * 20 <= $movie->rating_by_percent ? 'text-warning' : ''}}"></i>
                                @endfor
                            </span>
                        </div>
                    </div>
                    <div>
                        @if($movie->number_of_episodes > 0)
                            <a class="btn btn-warning px-2 mr-2" href="{{ route('movie.watch',['id' => $movie->id]) }}">
                                <i class="fas fa-play-circle mr-1"></i>
                                <span class="font-weight-bold">Watch</span>
                            </a>
                        @else
                            <button class="btn btn-secondary px-2 mr-2" type="button" disabled>
                                <i class="fas fa-play-circle mr-1"></i>
                                <span class="font-weight-bold">Updating...</span>
                            </button>
                        @endif
                        @guest
                            <button class="btn btn-success px-2" data-require-logged-in>
                                <i class="fas fa-heart mr-1"></i>
                                <span class="font-weight-bold">Favorite</span>
                            </button>
                        @else
                            @if(Auth::user()->favoriteMovies()->where('id', $movie->id)->exists())
                                <a class="btn btn-danger px-2" id="favorite-button"
                                   href="{{ route('movie.favorite.remove', ['id' => $movie->id]) }}">
                                    <i class="fas fa-heart mr-1"></i>
                                    <span class="font-weight-bold">Favorited</span>
                                </a>
                            @else
                                <a class="btn btn-success px-2" id="favorite-button"
                                   href="{{ route('movie.favorite.set', ['id' => $movie->id])}} ">
                                    <i class="fas fa-heart mr-1"></i>
                                    <span class="font-weight-bold">Favorite</span>
                                </a>
                            @endif
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
