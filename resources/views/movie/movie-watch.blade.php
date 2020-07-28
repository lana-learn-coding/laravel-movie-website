@extends('layouts.movie')

@section('content.movie')
    <div class="card mt-4">
        <div class="card-body card-font-size-lg" id="player">
            <video
                id="video"
                class="video-js vjs-fluid vjs-16-9"
            >
                @foreach($episodes  as $ep)
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
            <div class="mt-2">
                <div class="mb-4">
                    @if(!Auth::check() || !Auth::user()->favoriteMovies()->where('id', $movie->id)->exists())
                        <a class="btn btn-secondary btn-sm mr-2"
                           href="{{ route("movie.favorite.set", ["id" => $movie->id]) }}">
                            Add to favorite
                        </a>
                    @endif
                    <a href="{{ route("movie", ["id" => $movie->id]) }}" class="btn btn-secondary btn-sm">
                        Back to movie page
                    </a>
                </div>
                <h6 class="card-title font-weight-bold">Episode</h6>
                <div>
                    @foreach($movie->episode_list as $ep)
                        @if($ep->number == request()->ep)
                            <a class="btn shadow-sm btn-sm mr-1 btn-info"
                               href="{{ route('movie.watch.ep', ['id' => $movie->id, 'ep' => $ep->number]) }}">{{ $ep->number }}</a>
                        @else
                            <a class="btn shadow-sm btn-sm mr-1 btn-primary"
                               href="{{ route('movie.watch.ep', ['id' => $movie->id, 'ep' => $ep->number]) }}">{{ $ep->number }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        options = {
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
                $.post('{{ route('movie.views.bump', ['id' => $movie->id]) }}')
            }, fiveMinutes))
        });
    </script>
@endpush
