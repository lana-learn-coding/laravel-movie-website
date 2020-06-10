@scopedstyle('components.movie.movie-list')
    <style>
        .movie-card__img--fixed-ratio {
            width: 100%;
            overflow: hidden;
            padding-bottom: 135%;
            height: 0;
        }
    </style>
@endscopedstyle

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
</div>
