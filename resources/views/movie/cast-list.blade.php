@extends('layouts.main-app')

@section('content.header')
    <form method="GET" class="pb-4">
        <v-row>
            <v-col cols="12" md="6" lg="4" xl="3">
                <v-text-field
                    name="name"
                    type="text"
                    placeholder="Search casts..."
                    value="{{ request()->query('name') }}"
                    solo
                    single-line
                    hide-details
                >
                    <template v-slot:append>
                        <v-btn icon x-small type="submit">
                            <v-icon x-small>fas fa-search</v-icon>
                        </v-btn>
                    </template>
                </v-text-field>
            </v-col>
        </v-row>
    </form>
@endsection

@section('content.body')
    <div>
        @if(request()->input('name'))
            <h4 class="text-h5 mb-2">Casts named "{{ request()->input('name') }}"</h4>
        @else
            <h4 class="text-h5 mb-2">All Cast</h4>
        @endif
        <v-divider></v-divider>
    </div>
    <v-row>
        @if($casts->isEmpty())
            <v-col class="col w-100 text-center pt-1">
                <v-card>
                    <v-card-text class="card-body my-lg-4 body-1">
                        <h5 class="text-muted mb-0">
                            No Data found :(
                        </h5>
                    </v-card-text>
                </v-card>
            </v-col>
        @else
            @foreach ($casts as $cast)
                <v-col class="my-4 d-flex" cols="4" md="3" xl="2">
                    <div class="hvr-grow shadow d-flex flex-grow-1">
                        @include('components.movie.cast-card', ['cast' => $cast])
                    </div>
                </v-col>
            @endforeach
        @endif
    </v-row>

    <div class="d-flex justify-center w-100">
        @include('components.paging-bar', ['paginator'=> $casts])
    </div>
@endsection
