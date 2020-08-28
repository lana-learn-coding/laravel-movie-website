@extends('layouts.app')

@section('content')
    <v-container class="pt-8 pt-md-10 pt-lg-12 pt-xl-15">
        @yield('content.header')
        <v-row>
            <v-col cols="12" lg="8" xl="9" class="pr-xl-8">
                <div>
                    <h4 class="text-h5 mb-2">
                        <span class="d-none d-md-inline">Profile of </span>
                        <span class="d-md-none">User </span>
                        {{ $user->username }}</h4>
                    <v-divider></v-divider>
                </div>
                <div class="mt-2 mt-lg-3">
                    @include('components.user.user-detail-card',['user' => $user])
                </div>
                @yield('content.body.user')
                @yield('content.footer')
            </v-col>
            <v-col cols="12" lg="4" xl="3" class="d-none d-lg-block pl-lg-8 pl-lg-10">
                @include('components.user.user-nav')
            </v-col>
        </v-row>
    </v-container>
@endsection

