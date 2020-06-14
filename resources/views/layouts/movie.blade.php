@extends('layouts.app')

@scopedstyle('layouts.movie')
<style>
    .card-font-size-lg {
        font-size: 1rem;
    }

    .card-font-size-lg .card-title {
        font-min-size: 1.2rem;
    }
</style>
@endscopedstyle

@section('content')
    <div class="container mt-4">
        <ol class="breadcrumb mb-md-4">
            <li class="breadcrumb-item text-primary"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Some more here</a></li>
            <li class="breadcrumb-item active">{{ $movie->name }}</li>
        </ol>
        <div class="row">
            <div class="col-md-8 col-xl-9">
                <div>
                    <h5 class="mb-2">{{ $movie->name }}</h5>
                    <hr class="mt-2 border-primary">
                </div>
                @yield('content.movie')
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Casts</h5>
                        <p class="card-text">{{ $movie->description }}</p>
                    </div>
                </div>
                <div>
                    <h5 class="mt-4 mb-2">New Updated</h5>
                    <hr class="border-primary mt-2">
                    <div class="row overflow-hidden flex-nowrap pb-3 mb-4 mb-lg-5">
                        @foreach($news as $movie)
                            <div class="col-6 col-sm-4 col-lg-3">
                                @include('components.movie.movie-card', ['movie' => $movie])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <h5 class="mb-2">Hot Movies</h5>
                <hr class="border-primary mt-2">
                @include('components.movie.side-movie-list', ['movies' => $hots])
            </div>
        </div>
    </div>
@endsection
