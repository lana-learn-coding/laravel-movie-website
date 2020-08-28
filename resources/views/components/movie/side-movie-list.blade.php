@scopedstyle('components.movie.side-movie-list')
    <style>
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
@endscopedstyle

@foreach($movies as $movie)
    <div class="hot-movie-card border-none bg-transparent hvr-float d-flex align-items-center">
        <a class="stretched-link" href="{{ route('movie', ['id' => $movie->id]) }}"></a>
        <div class="row no-gutters">
            <div class="col-3 col-md-5">
                <div class="ratio-wrapper" style="padding-bottom: 85%">
                    <img class="w-100"
                         src="{{ $movie->image ? url('storage/' . $movie->image) : asset('img/movie-placeholder.jpg') }}"
                         alt="{{ $movie->name }}">
                </div>
            </div>
            <div class="col-9 col-md-7">
                <div class="card-body h-100 py-0 px-3 px-md-2">
                    <div
                        class="hot-movie-card__body--title text-info">{{ $movie->name }}</div>
                    <div
                        class=" hot-movie-card__body--description">{{ $movie->description }}</div>
                </div>
            </div>
        </div>
    </div>
    <hr class="hot-movie-card__separator border-secondary">
@endforeach
