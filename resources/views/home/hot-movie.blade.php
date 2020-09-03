@extends('layouts.app')

@section('content')
    <v-container class="pt-8 pt-md-10 pt-lg-12 pt-xl-15">
        @include('components.movie.filter-bar', ['excludes' => ['sort']])
        <v-row>
            <v-col md="8" xl="9" class="pr-xl-8">
                <v-tabs hide-slider optional show-arrows>
                    <v-tab
                        href="{{ route('hot') }}"
                        @if(Route::is('hot')) class="v-tab--active" @endif
                    >
                        All Time
                    </v-tab>
                    <v-tab
                        href="{{ route('hot.day') }}"
                        @if(Route::is('hot.day')) class="v-tab--active" @endif
                    >
                        By Day
                    </v-tab>
                    <v-tab
                        href="{{ route('hot.week') }}"
                        @if(Route::is('hot.week')) class="v-tab--active" @endif
                    >
                        By Week
                    </v-tab>
                    <v-tab
                        href="{{ route('hot.month') }}"
                        @if(Route::is('hot.month')) class="v-tab--active" @endif
                    >
                        By Month
                    </v-tab>
                </v-tabs>
                <div class="mt-5 mt-lg-8">
                    <h4 class="text-h5 mb-2">Most Viewed by {{ $by }}</h4>
                    <v-divider></v-divider>
                    @include('components.movie.movie-page', ['movies' => $movies])
                </div>
            </v-col>
            <v-col cols="12" md="4" xl="3" class="pl-md-5 pl-lg-10">
                <v-card>
                    <v-card-title>Newly Updated Movies</v-card-title>
                    <v-divider></v-divider>
                    <v-card-text>
                        @include('components.movie.side-movie-list', ['movies' => $updates])
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
@endsection
