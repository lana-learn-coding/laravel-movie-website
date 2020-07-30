@extends('layouts.main-app')

@section('content.header')
    <ol class="breadcrumb mb-4 mb-md-5">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('cast') }}">Casts</a></li>
        <li class="breadcrumb-item active">{{ $cast->name }}</li>
    </ol>
@endsection

@section('content.body')
    <div>
        <h4 class="mb-2">{{ $cast->name }}</h4>
        <hr class="mt-2 border-info">
    </div>
    @yield('content.movie')
    <div class="row mt-4">
        <div class="col-5 col-md-4 col-xl-3 d-flex">
            @include('components.movie.cast-card', ['cast' => $cast])
        </div>
        <div class="col-7 col-md-8 col-xl-9 pl-0">
            <div class="card h-100 border-0">
                <div class="card-body p-2 p-md-3">
                    <div>
                        <div class="mb-2 text-break">
                            <span class="font-weight-bold mr-2">Birth: </span>
                            <span>{{ $cast->birth_date ?: 'unknown' }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold mr-2">Gender: </span>
                            <span>{{ $cast->gender ?: 'unknown' }}</span>
                        </div>
                        <div class="mb-2">
                            <span class="font-weight-bold mr-2">Movies: </span>
                            <span>{{ $cast->movies_count }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <hr class="mb-0 mt-4 border-secondary">
        @include('components.movie.movie-page', ['movies' => $movies])
    </div>
@endsection

