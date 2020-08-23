@extends('layouts.main-app')

@section('content.body')
    <div>
        <h4 class="text-h5 mb-2">Movie in {{ request()->query('type') }} {{ request()->query('name') }}</h4>
        <v-divider></v-divider>
        @include('components.movie.movie-page', ['movies' => $movies])
    </div>
@endsection
