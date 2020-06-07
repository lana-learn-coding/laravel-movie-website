@extends("layouts.app")

@section('content.body')
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
                <div class="row">
                    @foreach ($movies as $movie)
                        <div class="col-6 col-md-4 col-xl-3 my-4">
                            <div class="movie-card card hvr-grow d-flex">
                                <a class="stretched-link" href="{{ route('movie', ['id' => $movie->id]) }}"></a>
                                <div class="movie-card__img--fixed-ratio">
                                    <img class="w-100" src="{{ $movie->image ?: asset('img/placeholder.png') }}"
                                         alt="{{ $movie->name }}">
                                </div>
                                <div class="card-body p-2">
                                    <h6 class="card-title text-primary font-weight-bold text-truncate">{{ $movie->name }}</h6>
                                    <div class="card-subtitle"><i class="mr-1 far fa-clock"></i>{{ $movie->length }} min
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center mt-3 w-100">
                        {{ $movies->links('components.paging-bar',['paginator'=> $movies]) }}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <h5 class="mb-2">Newly Updated Movies</h5>
                <hr class="border-primary mt-2">
                @foreach($updates as $updatedMovie)
                    <div class="hot-movie-card card bg-transparent hvr-shrink d-flex">
                        <a class="stretched-link" href="{{ route('movie', ['id' => $updatedMovie->id]) }}"></a>
                        <div class="row no-gutters">
                            <div class="col-3 col-md-5">
                                <div class="w-100 hot-movie-card__img--fixed-ratio">
                                    <img class="w-100" src="{{ $updatedMovie->image ?: asset('img/placeholder.png') }}"
                                         alt="{{ $updatedMovie->name }}">
                                </div>
                            </div>
                            <div class="col-9 col-md-7">
                                <div class="card-body h-100 py-0 px-3 px-md-2">
                                    <div
                                        class="hot-movie-card__body--title text-primary">{{ $updatedMovie->name }}</div>
                                    <div
                                        class=" hot-movie-card__body--description">{{ $updatedMovie->description }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hot-movie-card__separator">
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('content.style')
    <style>
        .movie-card__img--fixed-ratio {
            width: 100%;
            overflow: hidden;
            padding-bottom: 135%;
            height: 0;
        }

        .hot-movie-card__img--fixed-ratio {
            width: 100%;
            overflow: hidden;
            padding-bottom: 80%;
            height: 0;
        }

        .hot-movie-card__separator {
            border: 1px dashed #282828;
            margin: 1rem 0;
        }

        .hot-movie-card__body--title {
            padding-bottom: .4rem;
            font-size: .9rem;
            line-height: 1.1rem;
        }

        .hot-movie-card__body--description {
            overflow: hidden;
            line-height: .9rem;
            font-size: .8rem;
            height: 2.7rem;
        }
    </style>
@endsection