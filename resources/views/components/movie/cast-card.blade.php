<v-card class="w-100 elevation-8" href="{{ route('cast.detail', ['id' => $cast->id]) }}">
    <v-img
        aspect-ratio="0.8"
        src="{{ $cast->avatar ? url('storage/' . $cast->avatar) : asset('img/cast-placeholder.jpeg') }}"
        alt="{{ $cast->name }}"
    >
    </v-img>
    <v-card-title class="body-2">{{ $cast->name }}</v-card-title>
</v-card>
