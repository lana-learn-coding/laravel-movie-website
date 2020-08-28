@scopedstyle('components.movie.side-movie-list')
<style>
    .hot-movie-card__body--title {
        padding-bottom: .5rem;
        font-size: .9rem;
        line-height: 1.1rem;
    }

    .hot-movie-card__body--description {
        overflow: hidden;
        line-height: .9rem;
        font-size: .8rem;
        height: 2.7rem;
    }

    @media (min-width: 600px) {
        .hot-movie-card__body--description {
            height: 4.5rem;
        }
    }

    @media (min-width: 960px) {
        .hot-movie-card__body--description {
            height: 2.7rem;
        }
    }

    @media (min-width: 1264px) {
        .hot-movie-card__body--description {
            height: 3.6rem;
        }
    }

    @media (min-width: 1904px) {
        .hot-movie-card__body--description {
            height: 4.5rem;
        }
    }
</style>
@endscopedstyle

@foreach($movies as $movie)
    <v-card class="mb-3 mb-lg-5">
        <v-row>
            <v-col cols="4" md="5" class="pr-0">
                <v-img
                    aspect-ratio="1.5"
                    src="{{ $movie->image ? url('storage/' . $movie->image) : asset('img/movie-placeholder.jpg') }}"
                    alt="{{ $movie->name }}">
                </v-img>
            </v-col>
            <v-col cols="col-8 col-md-7">
                <div
                    class="hot-movie-card__body--title primary--text darken-2">{{ $movie->name }}</div>
                <div
                    class=" hot-movie-card__body--description">{{ $movie->description }}</div>
            </v-col>
        </v-row>
    </v-card>
@endforeach
