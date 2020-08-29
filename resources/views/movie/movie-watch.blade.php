@extends('layouts.movie')

@section('content.movie')
    <v-card class="mt-5">
        <v-card-text id="player">
            <video
                id="video"
                class="video-js vjs-fluid vjs-16-9 w-100"
            >
                @foreach($episodes as $ep)
                    <source src="{{ route('stream.video', ['path' => $ep->file]) }}"
                            type="video/mp4"
                            label="{{ $ep->quality }}"
                    >
                @endforeach
                <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser that supports HTML5 video
                </p>
            </video>
            <div class="mt-4 d-flex align-baseline flex-wrap">
                @if(!Auth::check() || !$movie->isFavoritedBy(Auth::id()))
                    <v-btn
                        data-require-login
                        text
                        small
                        class="mr-2 mb-2"
                        href="{{ route("movie.favorite.add", ["id" => $movie->id]) }}"
                    >
                        Add to favorite
                    </v-btn>
                @endif
                <v-btn text small href="{{ route("movie", ["id" => $movie->id]) }}"
                       class="btn btn-secondary btn-sm mr-2 mb-2">
                    Back <span class="d-none d-md-inline ml-1">to movie page</span>
                </v-btn>
                @if(!$movie->isReported(Auth::check() ? Auth::id() : getIp(), request()->ep))
                    <v-btn text small
                           href="{{ route("movie.report", ["id" => $movie->id, "ep" => request()->ep]) }}"
                           class="btn btn-secondary btn-sm mr-2 mb-2">
                        Report <span class="d-none d-md-inline ml-1">broken episode</span>
                    </v-btn>
                @endif
                <div class="ml-3 text-no-wrap">
                    @for($i = 1; $i <= 5; $i++)
                        <a class="text-decoration-none"
                           href="{{ route_with_query('movie.rating.rate', ['rating' => $i], ['id' => $movie->id]) }}"
                        >
                            <v-icon small data-require-login
                                    @if($i <= ($movie->ratedBy(Auth::id()) ?? 0)) class="yellow--text" @endif
                            >
                                fas fa-star
                            </v-icon>
                        </a>
                    @endfor
                </div>
            </div>
        </v-card-text>
        <v-card-title class="body-1 text--white">Episodes</v-card-title>
        <v-card-text>
            @foreach($movie->episode_list as $ep)
                @if($ep->number == request()->ep)
                    <v-btn
                        style="min-width: auto" class="px-3 mr-1"
                        color="indigo darken-2"
                        href="#player">
                        {{ $ep->name ?: $ep->number }}
                    </v-btn>
                @else
                    <v-btn
                        style="min-width: auto" class="px-3 mr-1"
                        href="{{ route('movie.watch.ep', ['id' => $movie->id, 'ep' => $ep->number]) }}">
                        {{ $ep->name ?: $ep->number }}
                    </v-btn>
                @endif
            @endforeach
        </v-card-text>
    </v-card>
@endsection

@scopedstyle('movie.movie-watch')
<link rel="stylesheet" href="{{ asset('/css/video.css') }}">
@endscopedstyle

@scopedscript('movie.movie-watch')
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

    videojs('video', options).ready(function () {
        const fiveMinutes = 1000 * 60 * 5;

        this.one('play', () => setTimeout(() => {
            bumpViews();
        }, fiveMinutes));
    });

    function bumpViews() {
        fetch('{{ route('movie.views.bump', ['id' => $movie->id]) }}', {
            method: 'POST',
        });
    }
</script>
@endscopedscript
