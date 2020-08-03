@extends('layouts.base.main-app-base')

@section('content.footer')
    <div>
        <h4 class="mt-4 mb-2">New Updated</h4>
        <hr class="border-info mt-2 mb-0">
        <div class="row overflow-hidden flex-nowrap pb-3 mb-4 mb-lg-5">
            @foreach($news as $movie)
                <div class="col-6 col-sm-4 col-lg-3 mt-4">
                    <div class="d-block shadow hvr-grow">
                        @include('components.movie.movie-card', ['movie' => $movie])
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('content.aside')
    <h4 class="mb-2">Hot Movies</h4>
    <hr class="border-info mt-2">
    @include('components.movie.side-movie-list', ['movies' => $hots])
@endsection
