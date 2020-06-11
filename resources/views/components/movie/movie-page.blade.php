<div class="row">
    @foreach ($movies as $movie)
        <div class="col-6 col-md-4 col-xl-3 my-4">
            @include('components.movie.movie-card', ['movie' => $movie])
        </div>
    @endforeach
</div>

<div class="d-flex justify-content-center mt-4 w-100">
    @include('components.paging-bar', ['paginator'=> $movies])
</div>
