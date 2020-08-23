@extends('layouts.base.main-app-base')

@section('content.footer')
    <div class="mt-6 mt-sm-8 mt-md-10 mt-lg-12">
        <h4 class="text-h5 mb-2">New Updated</h4>
        <v-divider></v-divider>
        <v-row class="overflow-hidden flex-nowrap pb-10 pb-lg-20">
            @foreach($news as $movie)
                <v-col class="mt-4 d-flex" cols="6" sm="4" lg="3">
                    <div class="d-block shadow hvr-grow flex-grow-1 d-flex">
                        @include('components.movie.movie-card', ['movie' => $movie])
                    </div>
                </v-col>
            @endforeach
        </v-row>
    </div>
@endsection

@section('content.aside')
    <v-card>
        <v-card-title>Hot Movies</v-card-title>
        <v-divider></v-divider>
        <v-card-text>
            @include('components.movie.side-movie-list', ['movies' => $hots])
        </v-card-text>
    </v-card>
@endsection
