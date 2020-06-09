@extends("layouts.app")

@section('content.body')
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
