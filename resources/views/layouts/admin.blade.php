@extends('layouts.base')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush
@section('body')
    <nav class="navbar navbar-dark bg-primary fixed-top shadow">
        <div class="mx-1">
            <a href="#" role="button" class="navbar-brand sidebar-toggler">
                <i class="fas fa-bars"></i>
            </a>
            <a href="{{ route('home') }}"
               class="navbar-brand">
                {{ $title ?? config('app.name', 'Laravel') }}
            </a>
        </div>
    </nav>
    <div id="sidebar" class="sidebar shadow-sm bg-dark border-right border-secondary">
        <div class="sidebar-content">
        </div>
    </div>
    <main>
        @yield('content')
    </main>
    <div class="sidebar-overlay"></div>
@endsection
@push('scripts')
    <script>
        $('.sidebar-toggler').on('click', () => {
            $('.sidebar').toggleClass('active');
        })
    </script>
@endpush
