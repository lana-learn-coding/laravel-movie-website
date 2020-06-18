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
    <ol class="breadcrumb mb-4 mb-md-5">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        @if($movie->category)
            <li class="breadcrumb-item">
                <a href="{{ route('search') . '?category=' . $movie->category->id }}">{{ $movie->category->name }}</a>
            </li>
        @endif
        @if($movie->language)
            <li class="breadcrumb-item">
                <a href="{{ route('search') . '?language=' . $movie->language->id }}">{{ $movie->language->name }}</a>
            </li>
        @endif
        <li class="breadcrumb-item active">{{ $movie->name }}</li>
    </ol>
@endsection

@section('content.body')
    <div>
        <h4 class="mb-2">{{ $movie->name }}</h4>
        <hr class="mt-2 border-info">
    </div>
    @yield('content.movie')
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title mb-3">Casts</h4>
            <div class="row">
                @foreach($movie->genres as $cast)
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2 hvr-bob">
                        <div class="card shadow border-0">
                            <div class="ratio-wrapper" style="padding-bottom: 120%">
                                <img src="{{ $cast->avatar ?: asset('img/placeholder.png') }}" alt="{{ $cast->name }}"
                                     class="card-img">
                            </div>
                            <div class="py-2 px-1">
                                <span class="text-info text-truncate" style="font-size: 85%">{{ $cast->name }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title">Movie Plot</h4>
            <h6 class="card-subtitle mb-3 text-muted">{{ $movie->name }}</h6>
            <p class="card-text">{{ $movie->description }}</p>
        </div>
    </div>
@endsection
