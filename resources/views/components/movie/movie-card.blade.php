<v-card class="w-100" href="{{ route('movie', ['id' => $movie->id]) }}">
    <v-img
        :aspect-ratio="0.76"
        src="{{ $movie->image ? url('storage/' . $movie->image) : asset('img/movie-placeholder.jpg') }}"
        alt="{{ $movie->name }}">
    </v-img>
    <v-card-title class="body-1">{{ $movie->name }}</v-card-title>
    <v-card-subtitle>
        <v-icon class="mr-2 text--disabled" small>far fa-clock</v-icon>{{ $movie->length }} min
    </v-card-subtitle>
</v-card>
