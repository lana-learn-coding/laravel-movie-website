<div class="row">
    @if($movies->isEmpty())
        <div class="col w-100 text-center pt-2">
            <div class="card">
                <div class="card-body my-lg-4">
                    <h5 class="text-muted mb-0">
                        No Data found :(
                    </h5>
                </div>
            </div>
        </div>
    @else
        @foreach ($movies as $movie)
            <div class="col-6 col-md-4 col-xl-3 my-4">
                <div class="hvr-grow d-flex">
                    @include('components.movie.movie-card', ['movie' => $movie])
                </div>
            </div>
        @endforeach
    @endif
</div>

<div class="d-flex justify-content-center mt-4 w-100">
    @include('components.paging-bar', ['paginator'=> $movies])
</div>
