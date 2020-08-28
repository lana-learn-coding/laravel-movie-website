@if(Auth::check() && request()->id && request()->id === strval(Auth::id()))
    <v-card>
        <v-card-title>Navigation</v-card-title>
        <v-card-text>
            <v-list nav>
                <v-list-item
                    href="{{ route('user.detail', ['id' => Auth::id()]) }}"
                    @if(Route::is('user.detail')) class="v-list-item--active" @endif
                >
                    <v-list-item-action>
                        <v-icon>fas fa-address-book</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Profile</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item
                    href="{{ route('user.update', ['id' => Auth::id()]) }}"
                    @if(Route::is('user.update')) class="v-list-item--active" @endif
                >
                    <v-list-item-action>
                        <v-icon>fas fa-user</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Account</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item
                    href="{{ route('user.favorite', ['id' => Auth::id()]) }}"
                    @if(Route::is('user.favorite')) class="v-list-item--active" @endif
                >
                    <v-list-item-action>
                        <v-icon>fas fa-heart</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Favorite</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item
                    href="{{ route('user.rated', ['id' => Auth::id()]) }}"
                    @if(Route::is('user.rated')) class="v-list-item--active" @endif
                >
                    <v-list-item-action>
                        <v-icon>fas fa-star</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Rated</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item @click="applicationLogoutDialog = true">
                    <v-list-item-action>
                        <v-icon>fas fa-sign-out-alt</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Sign Out</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-card-text>
    </v-card>
@else
    <v-card>
        <v-card-title>Hot Movies</v-card-title>
        <v-divider></v-divider>
        <v-card-text>
            @include('components.movie.side-movie-list', ['movies' => $hots])
        </v-card-text>
    </v-card>
@endif

