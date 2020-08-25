@extends('layouts.main-app')

@section('content.body')
    <div>
        <h4 class="text-h5 mb-2">{{ $cast->name }}</h4>
        <v-divider></v-divider>
    </div>
    @yield('content.movie')
    <v-row>
        <v-col cols="5" md="4" lg="3" xl="2" class="d-flex">
            @include('components.movie.cast-card', ['cast' => $cast])
        </v-col>
        <v-col class="pl-0 d-flex" cols="7" md="8" lg="9" xl="10">
            <v-card class="flex-grow-1 w-100">
                <v-card-text style="font-size: 1.1rem">
                    <div class="mb-4 text-break">
                        <span class="font-weight-bold mr-2">Birth: </span>
                        <span>{{ $cast->birth_date ?: 'unknown' }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-weight-bold mr-2">Gender: </span>
                        <span>{{ $cast->gender ?: 'unknown' }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-weight-bold mr-2">Movies: </span>
                        <span>{{ $cast->movies_count }}</span>
                    </div>
                </v-card-text>
            </v-card>
        </v-col>
    </v-row>

    <h4 class="text-h6 mb-2 mt-5 mt-sm-6 mt-md-7 mt-lg-8 mt-xl-10 font-weight-regular">Movies of {{ $cast->name }}</h4>
    <v-divider></v-divider>
    @include('components.movie.movie-page', ['movies' => $movies])
@endsection

