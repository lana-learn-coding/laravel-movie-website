@extends('layouts.app')

@section('content')
    <v-container class="pt-8 pt-md-10 pt-lg-12 pt-xl-15">
        @if(!$carousels->isEmpty())
            <v-carousel height="100%" hide-delimiters hide-delimiter-background show-arrows-on-hover cycle>
                @foreach($carousels as $carousel)
                    <v-carousel-item eager @if($carousel->link) href="{{ $carousel->link }}" @endif>
                        <v-card>
                            <v-img
                                width="100%"
                                height="100%"
                                :aspect-ratio="$vuetify.breakpoint.mdAndUp ? 3 : $vuetify.breakpoint.smAndUp ? 1.8 : 1.5"
                                src="{{ url('storage/' . $carousel->banner) }}">
                            </v-img>
                        </v-card>
                    </v-carousel-item>
                @endforeach
            </v-carousel>
        @endif
        <div class="mt-3 mt-md-5 mt-lg-8">
            <h4 class="text-h5 mb-2 text-center">Featured Movies</h4>
            <v-divider></v-divider>
            <v-row class="overflow-hidden flex-nowrap pb-3 mb-3 mb-lg-4">
                @foreach($features as $movie)
                    <v-col class="d-flex" cols="6" sm="4" md="3" xl="2">
                        <div class="hvr-grow d-block flex-grow-1 d-flex">
                            @include('components.movie.movie-card', ['movie' => $movie])
                        </div>
                    </v-col>
                @endforeach
            </v-row>
        </div>

        <v-row>
            <v-col md="8" xl="9" class="pr-xl-8">
                <div>
                    <h4 class="text-h5 mb-2">New Updated</h4>
                    <v-divider></v-divider>
                    @include('components.movie.movie-grid', ['movies' => $news])
                </div>
                <div class="mt-5 mt-lg-8">
                    <h4 class="text-h5 mb-2">New Released</h4>
                    <v-divider></v-divider>
                    @include('components.movie.movie-grid', ['movies' => $releases])
                </div>
            </v-col>
            <v-col cols="12" md="4" xl="3" class="pl-md-5 pl-lg-10">
                <v-card>
                    <v-card-title>Hot Movies</v-card-title>
                    <v-divider></v-divider>
                    <v-card-text>
                        @include('components.movie.side-movie-list', ['movies' => $hots])
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
@endsection
