@extends('layouts.movie')

@section('content.movie')
    <v-row class="row">
        <v-col cols="12" sm="5" md="4" lg="3" class="d-flex">
            @include('components.movie.movie-card', ['movie' => $movie])
        </v-col>
        <v-col cols="12" sm="7" md="8" lg="9" class="d-flex">
            <v-card class="w-100">
                <v-card-text class="body-1 px-5">
                    <v-row class="mb-5">
                        <v-col cols="12" lg="4" class="pt-1 pb-2">
                            <span class="font-weight-bold mr-2">Release: </span>
                            <span>{{ $movie->release_date ?: 'unknown' }}</span>
                        </v-col>
                        <v-col cols="12" lg="8" class="pt-1 pb-2">
                            <span class="font-weight-bold mr-2">Language: </span>
                            <span>{{ $movie->language ? $movie->language->name : 'updating' }}</span>
                        </v-col>
                        <v-col cols="12" lg="4" class="pt-1 pb-2">
                            <span class="font-weight-bold mr-2">Episodes: </span>
                            <span>{{ $movie->number_of_episodes ?: 'updating' }}</span>
                        </v-col>
                        <v-col cols="12" lg="8" class="pt-1 pb-2">
                            <span class="font-weight-bold mr-2">Category: </span>
                            <span>{{ $movie->category ? $movie->category->name : 'updating' }}</span>
                        </v-col>
                        <v-col cols="12" class="pt-1 pb-2">
                            <span class="font-weight-bold mr-2">Nation: </span>
                            <span>{{ $movie->nation ? $movie->nation->name : 'updating' }}</span>
                        </v-col>
                        <v-col cols="12" class="pt-1 pb-2">
                            <span class="font-weight-bold mr-2">Genres: </span>
                            @if($movie->genres && $movie->genres->isEmpty())
                                <span>none</span>
                            @else
                                @foreach($movie->genres as $genre)
                                    <span class="mr-1">{{ $genre->name }},</span>
                                @endforeach
                            @endif
                        </v-col>
                        <v-col cols="12" class="pt-1 pb-2">
                            <span class="font-weight-bold mr-2">Views: </span>
                            <span>{{ $movie->views_count_by_all_time ?: 0 }}</span>
                        </v-col>
                        <v-col cols="12" class="pt-1 pb-2">
                            <span class="font-weight-bold mr-2">Rating: </span>
                            <span class="small">
                                @for($i = 0; $i < 5; $i++)
                                    <v-icon small @if($i * 20 < $movie->rating_by_percent) color="yellow" @endif>fas fa-star</v-icon>
                                @endfor
                            </span>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col>
                            @if($movie->number_of_episodes > 0)
                                <v-btn class="mr-2 mb-2" href="{{ route('movie.watch',['id' => $movie->id]) }}"
                                       color="red darken-3">
                                    <v-icon small>fas fa-play-circle mr-1</v-icon>
                                    <span class="font-weight-bold">Watch</span>
                                    <span class="font-weight-bold ml-1 d-none d-lg-inline">Now</span>
                                </v-btn>
                            @else
                                <v-btn class="mr-2 mb-2" type="button" disabled>
                                    <v-icon small>fas fa-play-circle mr-1</v-icon>
                                    <span class="font-weight-bold">Updating...</span>
                                </v-btn>
                            @endif

                            @if($movie->isFavoritedBy(Auth::id()))
                                <v-btn class="mr-2 mb-2" id="favorite-button" color="pink darken-1"
                                       href="{{ route('movie.favorite.remove', ['id' => $movie->id]) }}">
                                    <v-icon small>fas fa-heart mr-1</v-icon>
                                    <span class="font-weight-bold">Favorited</span>
                                </v-btn>
                            @else
                                <v-btn class="mr-2 mb-2" id="favorite-button" color="indigo darken-2"
                                       href="{{ route('movie.favorite.add', ['id' => $movie->id])}} ">
                                    <v-icon small>fas fa-heart mr-1</v-icon>
                                    <span class="font-weight-bold">Favorite</span>
                                </v-btn>
                            @endif
                            <v-menu offset-y>
                                <template v-slot:activator="{ on, attrs }">
                                    @if($movie->ratedBy(Auth::id()))
                                        <v-btn
                                            class="mb-2"
                                            color="yellow darken-4"
                                            v-bind="attrs"
                                            v-on="on"
                                        >
                                            <v-icon small>fas fa-star</v-icon>
                                            <span class="body-1 ml-2">{{ $movie->ratedBy(Auth::id()) }}</span>
                                        </v-btn>
                                    @else
                                        <v-btn
                                            class="mb-2"
                                            color="green darken-1"
                                            v-bind="attrs"
                                            v-on="on"
                                        >
                                            <v-icon small>fas fa-star</v-icon>
                                            <span>Rate</span>
                                        </v-btn>
                                    @endif
                                </template>
                                <v-list dense>
                                    @for($i = 1; $i <= 5 ; $i++)
                                        <v-list-item
                                            @if($movie->ratedBy(Auth::id()) && $movie->ratedBy(Auth::id()) === $i) class="v-list-item--active"
                                            @endif
                                            href="{{ route_with_query('movie.rating.rate', ['rating' => $i], ['id' => $movie->id]) }}"
                                        >
                                            <v-list-item-title class="body-1">{{ $i }}</v-list-item-title>
                                            <v-list-item-icon>
                                                <v-icon small>fas fa-star</v-icon>
                                            </v-list-item-icon>
                                        </v-list-item>
                                    @endfor
                                </v-list>
                            </v-menu>
                        </v-col>
                    </v-row>
                </v-card-text>
            </v-card>
        </v-col>
    </v-row>
    @if(!$movie->trailers()->get()->isEmpty())
        <v-card class="mt-8 mt-md-10 mt-xl-12">
            <v-card-title>Trailers</v-card-title>
            <v-card-text>
                <v-carousel
                    @if($movie->trailers->groupBy('number')->count() <= 1) hide-delimiters @endif
                hide-delimiter-background
                    height="100%"
                    :show-arrows="false"
                >
                    @foreach($movie->trailers->groupBy('number') as $number => $trailer)
                        <v-carousel-item>
                            <v-card class="pa-1">
                                <video
                                    id="video-{{ $number }}"
                                    data-player="video-trailer-{{$number}}"
                                    class="video-js vjs-16-9 w-100"
                                >
                                    @foreach($trailer->sortBy('quality')  as $quality)
                                        <source src="{{ route('stream.video', ['path' => $quality->file]) }}"
                                                type="video/mp4"
                                                label="{{ $quality->quality }}"
                                        >
                                    @endforeach
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a
                                        web browser that supports HTML5 video
                                    </p>
                                </video>
                            </v-card>
                        </v-carousel-item>
                    @endforeach
                </v-carousel>
            </v-card-text>
        </v-card>
    @endif
@endsection

@scopedstyle('movie.movie-detail')
<link rel="stylesheet" href="{{ asset('/css/video.css') }}">
@endscopedstyle

@scopedscript('movie.movie-detail')
<script src="{{ asset('/js/video.js') }}"></script>
<script>
    const options = {
        controls: true,
        autoplay: false,
        preload: 'auto',
        controlBar: {
            children: [
                'playToggle',
                'progressControl',
                'volumePanel',
                'qualitySelector',
                'fullscreenToggle',
            ],
        },
    };

    document.querySelectorAll('[data-player^="video-trailer-"]').forEach(el => {
        videojs(el.id, options).ready(function () {
            const player = this;
            document.querySelector('button.v-carousel__controls__item').addEventListener('click', () => {
                player.pause();
            });
        });
    });
</script>
@endscopedscript
