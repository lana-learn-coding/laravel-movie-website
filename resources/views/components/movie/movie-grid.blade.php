<v-row>
    @if($movies->isEmpty())
        <v-col class="w-100 text-center pt-2">
            <v-card>
                <v-card-text class="py-5 py-lg-8">
                    <span class="body-1">
                        No Data found :(
                    </span>
                </v-card-text>
            </v-card>
        </v-col>
    @else
        @foreach ($movies as $movie)
            <v-col class="my-3 d-flex" cols="6" md="4" xl="3">
                <div class="hvr-grow shadow flex-grow-1 d-flex">
                    @include('components.movie.movie-card', ['movie' => $movie])
                </div>
            </v-col>
        @endforeach
    @endif
</v-row>
