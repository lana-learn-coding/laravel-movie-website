@extends('layouts.main-app')

@scopedstyle('layouts.movie')
<style>
    .card-font-size-lg {
        font-size: 1rem;
    }

    .card-font-size-lg .card-title {
        font-min-size: 1.2rem;
    }
</style>
@endscopedstyle

@section('content.header')
    <ol class="breadcrumb mb-4 mb-md-5">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
        <li class="breadcrumb-item active">{{ $user->username }}</li>
    </ol>
@endsection

@section('content.body')
    <div>
        <h4 class="mb-2"><span class="d-none d-lg-inline">Profile of </span> {{ $user->username }}</h4>
        <hr class="mt-2 mb-0 border-info">
    </div>
    <div class="mt-3">
        @include('components.user.user-detail-card',['user' => $user])
        <hr class="border-secondary">
    </div>
    @yield('content.body.user')
@endsection

@section('content.footer')
@endsection

@section('content.aside')
    @include('components.user.user-nav')
@endsection

