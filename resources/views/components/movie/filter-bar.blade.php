<form method="GET" class="pb-4 d-flex flex-column flex-md-row" id="filters-form" ref="form">
    <v-row>
        <v-col cols="6" sm="4" md="3" lg="2"
               @if(isset($excludes) && in_array('query', $excludes)) class="d-none" @endif>
            <v-text-field
                solo
                dense
                single-line
                hide-details
                type="text"
                name="query"
                placeholder="Search name"
                value="{{ request()->query('query') }}"
            >
            </v-text-field>
        </v-col>
        <v-col cols="6" sm="4" md="3" lg="2"
               @if(isset($excludes) && in_array('category', $excludes)) class="d-none" @endif>
            <v-select
                solo
                dense
                single-line
                hide-details
                placeholder="Select category"
                name="filters_category"
                value="{{ request()->query('filters_category') }}"
                :items="{{ json_encode($categories) ?: '' }}"
                :value-comparator="(a, b) => a == b"
                item-text="name"
                item-value="id"
            >
            </v-select>
        </v-col>
        <v-col cols="6" sm="4" md="3" lg="2"
               @if(isset($excludes) && in_array('genres', $excludes)) class="d-none" @endif>
            <v-select
                solo
                dense
                single-line
                hide-details
                placeholder="Select genres"
                name="filters_genres"
                value="{{ request()->query('filters_genres') }}"
                :items="{{ json_encode($genres) ?: '' }}"
                :value-comparator="(a, b) => a == b"
                item-text="name"
                item-value="id"
            >
            </v-select>
        </v-col>
        <v-col cols="6" sm="4" md="3" lg="2"
               @if(isset($excludes) && in_array('language', $excludes)) class="d-none" @endif>
            <v-select
                solo
                dense
                single-line
                hide-details
                placeholder="Select language"
                name="filters_language"
                value="{{ request()->query('filters_language') ?: '' }}"
                :items="{{ json_encode($languages) }}"
                :value-comparator="(a, b) => a == b"
                item-text="name"
                item-value="id"
            >
            </v-select>
        </v-col>
        <v-col cols="6" sm="4" md="3" lg="2"
               @if(isset($excludes) && in_array('nation', $excludes)) class="d-none" @endif>
            <v-select
                solo
                dense
                single-line
                hide-details
                placeholder="Select nation"
                name="filters_nation"
                value="{{ request()->query('filters_nation') ?: '' }}"
                :items="{{ json_encode($nations) }}"
                :value-comparator="(a, b) => a == b"
                item-text="name"
                item-value="id"
            >
            </v-select>
        </v-col>
        <v-col cols="6" sm="4" md="3" lg="2"
               @if(isset($excludes) && in_array('sort', $excludes)) class="d-none" @endif>
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
        <v-col cols="6" sm="4" md="3" lg="2"
               @if(isset($excludes) && in_array('date_range', $excludes)) class="d-none" @endif>
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
                        placeholder="Release date range"
                        name="filters_date_range"
                        readonly
                        v-bind="attrs"
                        v-on="on"
                    >
                    </v-text-field>
                </template>
                <v-date-picker v-model="dates" no-title range @change="menu = false"></v-date-picker>
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
    @if(isset($appends))
        @foreach($appends as $name => $value)
            <input type="hidden" name="{{ $name }}" value="{{ $value }}">
        @endforeach
    @endif
</form>

@section('vue')
    <script src="{{ asset('js/use.js') }}"></script>
    <script src="{{ asset('js/date-picker.js') }}"></script>
    <script>
        const app = new Vue({
            el: '#app',
            vuetify,
            setup() {
                return {
                    ...useApplicationBase(),
                    ...useMovieFilterDatePicker("{{ request()->query('filters_date_range') }}"),
                };
            },
        });
    </script>
@endsection
