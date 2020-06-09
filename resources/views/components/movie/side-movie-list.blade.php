@section('style')
    @parent
    <style>
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

@foreach($movies as $movie)
    <div class="hot-movie-card card bg-transparent hvr-shrink d-flex">
        <a class="stretched-link" href="{{ route('movie', ['id' => $movie->id]) }}"></a>
        <div class="row no-gutters">
            <div class="col-3 col-md-5">
                <div class="w-100 hot-movie-card__img--fixed-ratio">
                    <img class="w-100" src="{{ $movie->image ?: asset('img/placeholder.png') }}"
                         alt="{{ $movie->name }}">
                </div>
            </div>
            <div class="col-9 col-md-7">
                <div class="card-body h-100 py-0 px-3 px-md-2">
                    <div
                        class="hot-movie-card__body--title text-primary">{{ $movie->name }}</div>
                    <div
                        class=" hot-movie-card__body--description">{{ $movie->description }}</div>
                </div>
            </div>
        </div>
    </div>
    <hr class="hot-movie-card__separator">
@endforeach
