@extends('layouts.app')

@section('content')
    <v-container class="pt-8 pt-md-10 pt-lg-12 pt-xl-15">
        @yield('content.header')
        <v-row>
            <v-col md="8" xl="9" class="pr-xl-8">
                @yield('content.body')
                @yield('content.footer')
            </v-col>
            <v-col cols="12" md="4" xl="3" class="pl-md-5 pl-lg-10">
                @yield('content.aside')
            </v-col>
        </v-row>
    </v-container>
@endsection
