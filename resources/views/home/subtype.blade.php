@extends('layouts.main-app')

@section('content.body')
    <div>
        <h4 class="mb-2">
            <span class="mr-1">Movie in {{ request()->query('type') }} {{ request()->query('name') }}</span>
            <span class="small">({{ $movies->total() }})</span>
        </h4>
        <hr class="mt-2 border-info mb-0">
    </div>
    @include('components.movie.movie-page', ['movies' => $movies])
@endsection
