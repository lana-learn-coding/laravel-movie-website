@extends('layouts.main-app')

@section('content.header')
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Casts</li>
        <li class="ml-auto">
            <a href="#" class="hvr-grow-rotate" data-toggle="collapse" data-target="#search-form">
                <i class="fas fa-search"></i>
            </a>
        </li>
    </ol>
    <div class="collapse show" id="search-form">
        <form method="GET" class="pb-4">
            <div class="form-row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" name="name" value="{{ request()->input('name') }}">
                        <button class="btn btn-primary input-group-append px-3">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('content.body')
    <div>
        @if(request()->input('name'))
            <h4 class="mb-2">Casts named "{{ request()->input('name') }}"</h4>
        @else
            <h4 class="mb-2">All Cast</h4>
        @endif
        <hr class="mt-2 mb-0 border-info">
    </div>
    <div class="row">
        @if($casts->isEmpty())
            <div class="col w-100 text-center pt-2">
                <div class="card">
                    <div class="card-body my-lg-4">
                        <h5 class="text-muted mb-0">
                            No Data found :(
                        </h5>
                    </div>
                </div>
            </div>
        @else
            @foreach ($casts as $cast)
                <div class="col-4 col-md-3 col-xl-2 my-4">
                    <div class="hvr-grow shadow d-flex">
                        @include('components.movie.cast-card', ['cast' => $cast])
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="d-flex justify-content-center mt-4 w-100">
        @include('components.paging-bar', ['paginator'=> $casts])
    </div>
@endsection
