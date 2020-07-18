<div class="movie-card card d-flex">
    <a class="stretched-link" href="{{ route('movie', ['id' => $movie->id]) }}"></a>
    <div class="ratio-wrapper" style="padding-bottom: 130%">
        <img class="w-100" src="{{ $movie->image ? url('uploads/' . $movie->image) : asset('img/placeholder.png') }}"
             alt="{{ $movie->name }}">
    </div>
    <div class="card-body p-2">
        <h6 class="card-title text-info font-weight-bold text-truncate">{{ $movie->name }}</h6>
        <div class="card-subtitle text-muted" style="font-size: 90%"><i
                class="mr-1 far fa-clock"></i>{{ $movie->length }} min
        </div>
    </div>
</div>
