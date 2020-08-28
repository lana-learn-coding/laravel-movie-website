@extends('layouts.main-app')
@section('content.header')
    <form method="GET" class="pb-4 d-flex flex-column flex-md-row" id="filters-form" ref="form">
        <input type="hidden" name="query" value="{{ request()->query('query') }}">
        <v-row>
            <v-col cols="6" sm="4" md="3" lg="2">
                <v-select
                    solo
                    dense
                    single-line
                    hide-details
                    placeholder="Select category"
                    name="category"
                    value="{{ request()->query('category') }}"
                    :items="{{ json_encode($categories) ?: '' }}"
                    :value-comparator="(a, b) => a == b"
                    item-text="name"
                    item-value="id"
                >
                </v-select>
            </v-col>
            <v-col cols="6" sm="4" md="3" lg="2">
                <v-select
                    solo
                    dense
                    single-line
                    hide-details
                    placeholder="Select genre"
                    name="genre"
                    value="{{ request()->query('genre') }}"
                    :items="{{ json_encode($genres) ?: '' }}"
                    :value-comparator="(a, b) => a == b"
                    item-text="name"
                    item-value="id"
                >
                </v-select>
            </v-col>
            <v-col cols="6" sm="4" md="3" lg="2">
                <v-select
                    solo
                    dense
                    single-line
                    hide-details
                    placeholder="Select language"
                    name="language"
                    value="{{ request()->query('language') ?: '' }}"
                    :items="{{ json_encode($languages) }}"
                    :value-comparator="(a, b) => a == b"
                    item-text="name"
                    item-value="id"
                >
                </v-select>
            </v-col>
            <v-col cols="6" sm="4" md="3" lg="2">
                <v-select
                    solo
                    dense
                    single-line
                    hide-details
                    placeholder="Select nation"
                    name="nation"
                    value="{{ request()->query('nation') ?: '' }}"
                    :items="{{ json_encode($nations) }}"
                    :value-comparator="(a, b) => a == b"
                    item-text="name"
                    item-value="id"
                >
                </v-select>
            </v-col>
            <v-col cols="6" sm="4" md="3" lg="2">
                <v-select
                    solo
                    dense
                    single-line
                    hide-details
                    placeholder="Sort results"
                    name="sort"
                    value="{{ request()->query('sort') ?: '' }}"
                    :items="{{ json_encode([
                            (object)['id' => 'name,asc', 'name' => 'Name A-Z'],
                            (object)['id' => 'name,desc', 'name' => 'Name Z-A'],
                            (object)['id' => 'release_date,desc', 'name' => 'New Release'],
                            (object)['id' => 'length,desc', 'name' => 'Most Length'],
                            (object)['id' => 'length,asc', 'name' => 'Least Length']
                            ]) }}"
                    item-text="name"
                    item-value="id"
                >
                </v-select>
            </v-col>
            <v-col cols="6" sm="4" md="3" lg="2">
                <v-menu
                    v-model="menu"
                    :close-on-content-click="false"
                    :nudge-right="40"
                    transition="scale-transition"
                    offset-y
                    min-width="290px"
                >
                    <template v-slot:activator="{ on, attrs }">
                        <v-text-field
                            :value="dateRangeValue"
                            solo
                            dense
                            single-line
                            hide-details
                            placeholder="Filter range"
                            name="date_range"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                        ></v-text-field>
                    </template>
                    <v-date-picker v-model="date" no-title range @change="menu = false"></v-date-picker>
                </v-menu>
            </v-col>
        </v-row>
        <div>
            <v-row>
                <v-col cols="12" class="d-flex justify-end">
                    <v-btn color="indigo darken-2" class="px-4 ml-md-3" style="min-width: auto" type="submit">
                        <v-icon small>fas fa-filter</v-icon>
                    </v-btn>
                </v-col>
            </v-row>
        </div>
    </form>
@endsection

@section('content.body')
    <div>
        <h4 class="text-h5 mb-2">
            <span class="mr-1">Result for "{{ request()->query('query') ?: 'All Movies' }}"</span>
            <span class="text-h6">({{ $movies->total() }})</span>
        </h4>
        <v-divider></v-divider>
        @include('components.movie.movie-page', ['movies' => $movies])
    </div>
@endsection

@section('vue')
    <script src="{{ asset('js/use.js') }}"></script>
    <script>
        const app = new Vue({
            el: '#app',
            vuetify,
            setup() {
                return {
                    ...useApplicationBase(),
                    ...useDatePicker(),
                };
            },
        });

        function useDatePicker() {
            const oldDate = "{{ request()->query('date_range') }}";
            const menu = ref(false);
            const date = ref(oldDate.split(' to '));
            const dateRangeValue = computed(() => {
                return date.value.join(' to ');
            });

            return {menu, date, dateRangeValue};
        }
    </script>
@endsection
