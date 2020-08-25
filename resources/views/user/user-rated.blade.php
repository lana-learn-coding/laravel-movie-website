@extends('layouts.user')

@section('content.body.user')
    <div class="mt-4 mt-md-5 mt-lg-8 mt-xl-9">
        <h4 class="text-h6 mb-2">Rated Movies</h4>
        <v-divider></v-divider>
        @include('components.movie.movie-page', ['movies' => $rateds])
    </div>
@endsection
