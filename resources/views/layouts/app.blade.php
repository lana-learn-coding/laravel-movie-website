@extends('layouts.base.app-base')

@section('body')
    <v-app id="inspire">
        <v-navigation-drawer
            v-model="applicationDrawer"
            class="d-lg-none"
            app
            clipped
            disable-resize-watcher
            temporary
        >
            <v-list dense nav subheader>
                <v-subheader>Movie</v-subheader>
                <v-list-item
                    link
                    href="{{ route('home') }}"
                    @if(Route::is('home')) class="v-list-item--active" @endif
                >
                    <v-list-item-action>
                        <v-icon>fas fa-home</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Home</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item
                    link
                    href="{{ route('hot') }}"
                    @if(Route::is('hot*')) class="v-list-item--active" @endif
                >
                    <v-list-item-action>
                        <v-icon>fas fa-fire</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Hot</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item
                    link
                    href="{{ route('new') }}"
                    @if(Route::is('new*')) class="v-list-item--active" @endif
                >
                    <v-list-item-action>
                        <v-icon>fas fa-newspaper</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>New</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item
                    link
                    href="{{ route('cast') }}"
                    @if(Route::is('cast*')) class="v-list-item--active" @endif
                >
                    <v-list-item-action>
                        <v-icon>fas fa-user-tie</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Cast</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <app-drawer-nav-dropdown
                    icon="fas fa-box"
                    name="Categories"
                    query-name="category"
                    query-type="{{ request()->query('type') }}"
                    query-id="{{ request()->query('id') }}"
                    :items="{{ json_encode($categories) }}"
                >
                </app-drawer-nav-dropdown>
                <app-drawer-nav-dropdown
                    icon="fas fa-globe"
                    name="Languages"
                    query-name="language"
                    query-type="{{ request()->query('type') }}"
                    query-id="{{ request()->query('id') }}"
                    :items="{{ json_encode($languages) }}"
                >
                </app-drawer-nav-dropdown>
                <app-drawer-nav-dropdown
                    icon="fas fa-globe-asia"
                    name="Nations"
                    query-name="nation"
                    query-type="{{ request()->query('type') }}"
                    query-id="{{ request()->query('id') }}"
                    :items="{{ json_encode($languages) }}"
                >
                </app-drawer-nav-dropdown>
                <app-drawer-nav-dropdown
                    icon="fas fa-video"
                    name="Genres"
                    query-name="genres"
                    query-type="{{ request()->query('type') }}"
                    query-id="{{ request()->query('id') }}"
                    :items="{{ json_encode($genres) }}"
                >
                </app-drawer-nav-dropdown>
                <v-divider></v-divider>
                <v-subheader>User</v-subheader>
                @guest
                    <v-list-item
                        href="{{ route('login') }}"
                        @if(Route::is('login')) class="v-list-item--active" @endif
                    >
                        <v-list-item-action>
                            <v-icon>fas fa-sign-in-alt</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>Login</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-list-item
                        href="{{ route('register') }}"
                        @if(Route::is('register')) class="v-list-item--active" @endif
                    >
                        <v-list-item-action>
                            <v-icon>fas fa-user-plus</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>Register</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                @else
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
                    <v-list-item @click="applicationLogoutDialog = true">
                        <v-list-item-action>
                            <v-icon>fas fa-sign-out-alt</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>Sign Out</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                @endguest
            </v-list>
        </v-navigation-drawer>

        <v-app-bar
            app
            clipped-left
        >
            <v-container class="mx-auto py-0">
                <v-row align="center">
                    <v-app-bar-nav-icon
                        @click.stop="toggleApplicationDrawerVisibility()"
                        class="d-lg-none mr-sm-2 mr-md-4"
                    >
                    </v-app-bar-nav-icon>
                    <v-toolbar-title class="d-none d-md-block d-xl-block mr-6">LaraMov</v-toolbar-title>

                    <div class="d-none d-lg-block">
                        <app-bar-nav-button @if(Route::is('home')) active @endif href="{{ route('home') }}">
                            Home
                        </app-bar-nav-button>
                        <app-bar-nav-button @if(Route::is('hot*')) active @endif href="{{ route('hot') }}">
                            Hot
                        </app-bar-nav-button>
                        <v-menu offset-y open-on-hover min-width="200px">
                            <template v-slot:activator="{ on }">
                                <v-btn
                                    {{ Route::is('new.*') ? 'depressed' : 'text' }}
                                    @if(Route::is('new.*')) color="indigo darken-2" @endif
                                    href="{{ route('new') }}"
                                    v-on="on"
                                >
                                    New
                                </v-btn>
                            </template>
                            <v-list>
                                <v-list-item
                                    link
                                    href="{{ route('new.released') }}"
                                    @if(Route::is('new.released')) class="v-list-item--active" @endif
                                >
                                    <v-list-item-title>New Released</v-list-item-title>
                                </v-list-item>
                                <v-list-item
                                    link
                                    href="{{ route('new.updated') }}"
                                    @if(Route::is('new.updated')) class="v-list-item--active" @endif
                                >
                                    <v-list-item-title>New Updated</v-list-item-title>
                                </v-list-item>
                                <v-list-item
                                    link
                                    href="{{ route('new.created') }}"
                                    @if(Route::is('new.created')) class="v-list-item--active" @endif
                                >
                                    <v-list-item-title>New Added</v-list-item-title>
                                </v-list-item>
                            </v-list>
                        </v-menu>
                        <app-bar-nav-dropdown
                            name="genres"
                            query-name="genres"
                            query-type="{{ request()->query('type') }}"
                            query-id="{{ request()->query('id') }}"
                            :items="{{ json_encode($genres) }}"
                        >
                        </app-bar-nav-dropdown>
                        <app-bar-nav-dropdown
                            activator-class="d-none d-xl-inline"
                            name="categories"
                            query-name="category"
                            query-type="{{ request()->query('type') }}"
                            query-id="{{ request()->query('id') }}"
                            :items="{{ json_encode($categories) }}"
                        >
                        </app-bar-nav-dropdown>
                        <app-bar-nav-dropdown
                            activator-class="d-none d-xl-inline"
                            name="languages"
                            query-name="language"
                            query-type="{{ request()->query('type') }}"
                            query-id="{{ request()->query('id') }}"
                            :items="{{ json_encode($languages) }}"
                        >
                        </app-bar-nav-dropdown>
                        <app-bar-nav-dropdown
                            activator-class="d-none d-xl-inline"
                            name="nations"
                            query-name="nation"
                            query-type="{{ request()->query('type') }}"
                            query-id="{{ request()->query('id') }}"
                            :items="{{ json_encode($nations) }}"
                        >
                        </app-bar-nav-dropdown>
                        <app-bar-nav-button @if(Route::is('cast*')) active @endif href="{{ route('cast') }}">
                            Casts
                        </app-bar-nav-button>
                    </div>

                    <v-spacer class="d-none d-lg-block"></v-spacer>
                    <form action="{{ route("search") }}" class="flex-grow-1 mr-6">
                        @csrf
                        <v-text-field
                            name="query"
                            type="text"
                            placeholder="Search movie..."
                            value="{{ request()->query('query') }}"
                            solo
                            flat
                            single-line
                            hide-details
                        >
                            <template v-slot:append>
                                <v-btn icon x-small type="submit">
                                    <v-icon x-small>fas fa-search</v-icon>
                                </v-btn>
                            </template>
                        </v-text-field>
                    </form>

                    @guest
                        <v-menu offset-y open-on-hover left min-width="200px">
                            <template v-slot:activator="{ on }">
                                <v-btn icon v-on="on" class="d-none d-sm-inline-flex">
                                    <v-avatar size="40">
                                        <img
                                            alt="avatar"
                                            src="{{ asset('img/avatar-placeholder.jpg') }}"
                                        >
                                    </v-avatar>
                                </v-btn>
                            </template>
                            <v-list>
                                <v-list-item
                                    href="{{ route('login') }}"
                                    @if(Route::is('login')) class="v-list-item--active" @endif
                                >
                                    <v-list-item-title>Login</v-list-item-title>
                                    <v-list-item-icon>
                                        <v-icon small>fas fa-sign-in-alt</v-icon>
                                    </v-list-item-icon>
                                </v-list-item>
                                <v-list-item
                                    href="{{ route('register') }}"
                                    @if(Route::is('register')) class="v-list-item--active" @endif
                                >
                                    <v-list-item-title>Register</v-list-item-title>
                                    <v-list-item-icon>
                                        <v-icon small>fas fa-user-plus</v-icon>
                                    </v-list-item-icon>
                                </v-list-item>
                            </v-list>
                        </v-menu>
                    @else
                        <v-menu offset-y open-on-hover left min-width="200px">
                            <template v-slot:activator="{ on }">
                                <v-btn icon v-on="on" class="d-none d-sm-inline-flex">
                                    <v-avatar size="40" color="indigo darken-2">
                                        @if(Auth::user()->avatar)
                                            <img
                                                alt="avatar"
                                                src="{{ url(Auth::user()->avatar) }}"
                                            >
                                        @else
                                            {{ ucfirst(substr(Auth::user()->username, 0, 1)) }}
                                        @endif
                                    </v-avatar>
                                </v-btn>
                            </template>
                            <v-list>
                                <v-list-item two-line>
                                    <v-list-item-content>
                                        <v-list-item-title>{{ Auth::user()->username }}</v-list-item-title>
                                        <v-list-item-subtitle>{{ Auth::user()->email }}</v-list-item-subtitle>
                                    </v-list-item-content>
                                </v-list-item>

                                <v-divider></v-divider>
                                <v-list-item
                                    href="{{ route('user.detail', ['id' => Auth::id()]) }}"
                                    @if(Route::is('user.detail')) class="v-list-item--active" @endif
                                >
                                    <v-list-item-title>Profile</v-list-item-title>
                                    <v-list-item-icon>
                                        <v-icon small>fas fa-address-book</v-icon>
                                    </v-list-item-icon>
                                </v-list-item>
                                <v-list-item
                                    href="{{ route('user.update', ['id' => Auth::id()]) }}"
                                    @if(Route::is('user.update')) class="v-list-item--active" @endif
                                >
                                    <v-list-item-title>Account</v-list-item-title>
                                    <v-list-item-icon>
                                        <v-icon small>fas fa-user</v-icon>
                                    </v-list-item-icon>
                                </v-list-item>
                                <v-list-item
                                    href="{{ route('user.rated', ['id' => Auth::id()]) }}"
                                    @if(Route::is('user.rated')) class="v-list-item--active" @endif
                                >
                                    <v-list-item-title>Rated</v-list-item-title>
                                    <v-list-item-icon>
                                        <v-icon small>fas fa-star</v-icon>
                                    </v-list-item-icon>
                                </v-list-item>
                                <v-list-item
                                    href="{{ route('user.favorite', ['id' => Auth::id()]) }}"
                                    @if(Route::is('user.favorite')) class="v-list-item--active" @endif
                                >
                                    <v-list-item-title>Favorite</v-list-item-title>
                                    <v-list-item-icon>
                                        <v-icon small>fas fa-heart</v-icon>
                                    </v-list-item-icon>
                                </v-list-item>
                                <v-divider></v-divider>
                                <v-list-item @click="applicationLogoutDialog = true">
                                    <v-list-item-title>Sign out</v-list-item-title>
                                    <v-list-item-icon>
                                        <v-icon small>fas fa-sign-in-alt</v-icon>
                                    </v-list-item-icon>
                                </v-list-item>
                            </v-list>
                        </v-menu>
                    @endguest
                </v-row>
            </v-container>
        </v-app-bar>

        <v-main>
            @yield('content')
        </v-main>
    </v-app>

    <v-dialog v-model="applicationLogoutDialog" max-width="450px">
        <v-card>
            <v-card-title>Logout</v-card-title>
            <v-card-text>You are about to logout</v-card-text>
            <v-card-actions class="justify-end">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <v-btn text color="error" type="submit">Logout</v-btn>
                </form>
                <v-btn text @click.stop="applicationLogoutDialog = false">Cancel</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
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
                };
            },
        });
    </script>
@endsection
