@extends('layouts.main-app')
@section('content.header')
    <ol class="breadcrumb mb-md-4">
        <li class="breadcrumb-item text-info"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Search</li>
        <li class="ml-auto">
            <a href="#" class="hvr-grow-rotate" data-toggle="collapse" data-target="#filter-form"><i
                    class="fas fa-filter"></i></a>
        </li>
    </ol>
    <div class="collapse show" id="filter-form">
        <form method="GET" class="pb-4">
            <input type="hidden" name="query" value="{{ request()->query('query') }}">
            <div class="form-row">
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="form-group">
                        @include('components.search-filter', ['name' => 'category', 'options' => $categories])
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="form-group">
                        @include('components.search-filter', ['name' => 'genre', 'options' => $genres])
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="form-group">
                        @include('components.search-filter', ['name' => 'language', 'options' => $languages])
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="form-group">
                        @include('components.search-filter', ['name' => 'nation', 'options' => $nations])
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('content.body')
    <div>
        <h4 class="mb-2">Result for "{{ request()->query('query') ?: 'All Movies' }}"</h4>
        <hr class="mt-2 mb-0 border-info">
    </div>
    @include('components.movie.movie-page', ['movies' => $movies])
@endsection
