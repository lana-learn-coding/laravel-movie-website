@extends('layouts.main-app')

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

@section('content.header')
    <ol class="breadcrumb mb-md-4">
        <li class="breadcrumb-item text-primary"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Some more here</a></li>
        <li class="breadcrumb-item active">{{ $movie->name }}</li>
    </ol>
@endsection

@section('content.body')
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
@endsection