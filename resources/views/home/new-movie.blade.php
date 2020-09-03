@extends('layouts.app')

@section('content')
    <v-container class="pt-8 pt-md-10 pt-lg-12 pt-xl-15">
        @include('components.movie.filter-bar', ['excludes' => ['sort']])
        <v-row>
            <v-col md="8" xl="9" class="pr-xl-8">
                <v-tabs hide-slider optional show-arrows>
                    <v-tab
                        href="{{ route('new.released') }}"
                        @if(Route::is('new.released')) class="v-tab--active" @endif
                    >
                        Newly Released
                    </v-tab>
                    <v-tab
                        href="{{ route('new.updated') }}"
                        @if(Route::is('new.updated')) class="v-tab--active" @endif
                    >
                        Newly Updated
                    </v-tab>
                    <v-tab
                        href="{{ route('new.created') }}"
                        @if(Route::is('new.created')) class="v-tab--active" @endif
                    >
                        Newly Added
                    </v-tab>
                </v-tabs>
                <div class="mt-5 mt-lg-8">
                    <h4 class="text-h5 mb-2">New movies by {{ $by }} date</h4>
                    <v-divider></v-divider>
                    @include('components.movie.movie-page', ['movies' => $movies])
                </div>
            </v-col>
            <v-col cols="12" md="4" xl="3" class="pl-md-5 pl-lg-10">
                <v-card>
                    <v-card-title>Hot movies by day</v-card-title>
                    <v-divider></v-divider>
                    <v-card-text>
                        @include('components.movie.side-movie-list', ['movies' => $hots])
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
@endsection
