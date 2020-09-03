@extends('layouts.main-app')

@section('content.header')
    @include('components.movie.filter-bar', ['excludes' => ['query']])
@endsection

@section('content.body')
    <div>
        <h4 class="text-h5 mb-2">
            <span class="mr-1">Result for "{{ request()->query('query') ?: 'All Movies' }}"</span>
            <span class="text-h6">({{ $movies->total() }})</span>
        </h4>
        <v-divider></v-divider>
        @include('components.movie.movie-page', ['movies' => $movies])
    </div>
@endsection
