@include('components.movie.movie-grid')

<div class="d-flex justify-center w-100">
    @include('components.paging-bar', ['paginator'=> $movies])
</div>
