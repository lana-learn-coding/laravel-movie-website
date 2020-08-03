@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @yield('content.header')
        <div class="row">
            <div class="col-md-8 col-xl-9">
                @yield('content.body')
                @yield('content.footer')
            </div>
            <div class="col-md-4 col-xl-3">
                @yield('content.aside')
            </div>
        </div>
    </div>
@endsection
