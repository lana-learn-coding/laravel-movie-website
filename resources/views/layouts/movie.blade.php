@extends('layouts.main-app')

@section('content.body')
    <div>
        <h4 class="text-h5 mb-2">{{ $movie->name }}</h4>
        <v-divider></v-divider>
    </div>
    @yield('content.movie')
    <v-card class="mt-8 mt-md-10 mt-xl-12">
        <v-card-title>Casts</v-card-title>
        <v-card-text>
            <v-row>
                @foreach($movie->casts as $cast)
                    <v-col cols="6" sm="4" md="3" xl="2" class="d-flex">
                        <div class="d-flex flex-grow-1 hvr-grow">
                            @include('components.movie.cast-card', ['$cast' => $cast])
                        </div>
                    </v-col>
                @endforeach
            </v-row>
        </v-card-text>
    </v-card>
    <v-card class="mt-8 mt-md-10 mt-xl-12">
        <v-card-title>Movie Plot</v-card-title>
        <v-card-subtitle class="body-1">{{ $movie->name }}</v-card-subtitle>
        <v-card-text class="body-1">
            {{ $movie->description }}
        </v-card-text>
    </v-card>
    <v-card class="mt-8 mt-md-10 mt-xl-12">
        <v-card-title>Comment</v-card-title>
        <v-card-subtitle class="body-1">Write a comment</v-card-subtitle>
        <v-card-text>
            <form action="{{ route('movie.comment.write', [ 'id' => $movie->id]) }}" method="POST">
                <v-row>
                    @csrf
                    <v-col cols="3" sm="2" lg="1">
                        @guest
                            <v-img
                                class="rounded"
                                aspect-ratio="1"
                                src="{{ asset('img/avatar-placeholder.jpg') }}"
                                alt="anonymous"
                            >
                            </v-img>
                        @else
                            <v-img
                                class="rounded"
                                aspect-ratio="1"
                                src="{{ Auth::user()->avatar ? url('storage/' . Auth::user()->avatar) : asset('img/avatar-placeholder.jpg') }}"
                                alt="{{ Auth::user()->username }}"
                            >
                            </v-img>
                        @endguest
                        <v-btn type="submit" color="indigo darken-2" class="w-100 mt-3">Post</v-btn>
                    </v-col>
                    <v-col cols="9" sm="10" lg="11">
                        <v-textarea dense outlined auto-grow placeholder="Write a comment" name="comment"></v-textarea>
                    </v-col>
                </v-row>
            </form>
            @if(!$movie->comments->isEmpty())
                <v-divider class="mb-3"></v-divider>
            @endif
            @foreach($movie->comments as $user)
                <v-row>
                    <v-col cols="3" sm="2" lg="1" class="pr-3 pr-lg-5">
                        <v-img
                            class="rounded"
                            aspect-ratio="1"
                            src="{{ $user->avatar ? url('storage/' . $user->avatar) : asset('img/avatar-placeholder.jpg') }}"
                            alt="{{ $user->username }}"
                        >
                        </v-img>
                    </v-col>
                    <v-col cols="9" sm="10" lg="11" class="pl-0">
                        <a style="font-size: 1.1rem"
                           href="{{ route('user.detail', ['id' => $user->id]) }}"
                           class="text-decoration-none blue--text text--lighten-1 mb-3">{{ $user->username }}
                        </a>
                        <div class="subtitle-1">{{ $user->pivot->comment }}</div>
                    </v-col>
                </v-row>
            @endforeach
        </v-card-text>
    </v-card>
@endsection
