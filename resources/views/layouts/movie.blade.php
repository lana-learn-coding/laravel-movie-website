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
        @if($movie->category)
            <li class="breadcrumb-item">
                <a href="{{ route_with_query('type', ['id' => $movie->category->id, 'name' => $movie->category->name, 'type' => 'category'])}}">
                    {{ $movie->category->name }}
                </a>
            </li>
        @endif
        @if($movie->language)
            <li class="breadcrumb-item">
                <a href="{{ route_with_query('type', ['id' => $movie->language->id, 'name' => $movie->language->name, 'type' => 'language'])}}">{{ $movie->language->name }}</a>
            </li>
        @endif
        <li class="breadcrumb-item active">{{ $movie->name }}</li>
    </ol>
@endsection

@section('content.body')
    <div>
        <h4 class="mb-2">{{ $movie->name }}</h4>
        <hr class="mt-2 border-info">
    </div>
    @yield('content.movie')
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title mb-3">Casts</h4>
            <div class="row">
                @foreach($movie->casts as $cast)
                    <div class="col-4 col-lg-3 col-xl-2 hvr-bob">
                        @include('components.movie.cast-card', ['$cast' => $cast])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <h4 class="card-title">Movie Plot</h4>
            <h6 class="card-subtitle mb-3 text-muted">{{ $movie->name }}</h6>
            <p class="card-text">{{ $movie->description }}</p>
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body" id="comment">
            <h4 class="card-title">Comments</h4>
            <h6 class="card-subtitle mb-3 text-muted">Write a comment</h6>
            <form class="row px-3" method="post" action="{{ route('movie.comment.write', [ 'id' => $movie->id]) }}">
                @csrf
                <div class="col-2 col-lg-1 px-0 mt-1">
                    @guest
                        <img class="card-image w-100" src="{{ asset('img/avatar-placeholder.jpg') }}" alt="anonymous">
                        <button type="submit" class="btn btn-info btn-sm w-100 mt-2" data-require-logged-in>Post
                        </button>
                    @else
                        <img class="card-image w-100"
                             src="{{ Auth::user()->avatar ?: asset('img/avatar-placeholder.jpg') }}" alt="anonymous">
                        <button type="submit" class="btn btn-info btn-sm w-100 mt-2">Post</button>
                    @endguest
                </div>
                <div class="col-10 col-lg-11">
                    <div class="form-group">
                        <textarea type="text" name="comment" class="form-control" rows="4"
                                  data-require-logged-in></textarea>
                        @error('comment')
                        <div class="mt-1 text-danger">Please enter something</div>
                        @enderror
                    </div>
                </div>
            </form>

            <hr class="border-secondary mt-2">
            @foreach($movie->comments as $user)
                <div class="row pb-4">
                    <div class="col-2 col-lg-1 pr-1 pt-1">
                        <img class="card-image w-100" src="{{ asset('img/avatar-placeholder.jpg') }}" alt="anonymous">
                    </div>
                    <div class="col-10 col-lg-11 pl-2">
                        <a href="{{ route('user.detail', ['id' => $user->id]) }}"><b>{{ $user->username }}</b></a>
                        <div>{{ $user->pivot->comment }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
