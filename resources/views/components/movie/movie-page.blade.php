@include('components.movie.movie-list', ['movies' => $movies])

<div class="d-flex justify-content-center mt-4 w-100">
    @include('components.paging-bar', ['paginator'=> $movies])
</div>
