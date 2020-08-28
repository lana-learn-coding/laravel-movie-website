@extends('layouts.user')

@section('content.body.user')
    <div class="mt-4">
        <h4 class="mb-2">Favorite Movies</h4>
        <hr class="border-info mt-2 mb-0">
        @include('components.movie.movie-page', ['movies' => $favorites])
    </div>
@endsection
