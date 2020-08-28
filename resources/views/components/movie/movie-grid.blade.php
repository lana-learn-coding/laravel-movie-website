<v-row>
    @if($movies->isEmpty())
        <v-col class="w-100 text-center pt-2">
            <div class="card">
                <div class="card-body my-lg-4">
                    <h5 class="text-muted mb-0">
                        No Data found :(
                    </h5>
                </div>
            </div>
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
