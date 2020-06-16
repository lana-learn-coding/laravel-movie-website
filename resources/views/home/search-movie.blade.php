@extends('layouts.main-app')

@section('content.body')
    <div>
        <h5 class="mb-2">Result for "{{ request()->query('query') ?: 'All Movies' }}"</h5>
        <hr class="mt-2 border-primary">
    </div>
    <form method="GET">
        <input type="hidden" name="query" value="{{ request()->query('query') }}">
        <div class="form-row">
            <div class="col-lg-3 col-6">
                <div class="form-group">
                    <select name="category" class="form-control" onchange="this.form.submit()">
                        <option value="" class="text-muted" {{ request()->query('category') ? '' : 'selected' }}>
                            All Category
                        </option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request()->query('category') == $category->id ? 'selected' : '' }}
                            >
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="form-group">
                    <select name="genre" class="form-control" onchange="this.form.submit()">
                        <option value="" class="text-muted" {{ request()->query('genre') ? '' : 'selected' }}>
                            All Genre
                        </option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}"
                                {{ request()->query('genre') == $genre->id ? 'selected' : '' }}
                            >
                                {{ $genre->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="form-group">
                    <select name="date-after" class="form-control" onchange="this.form.submit()">
                        <option value="" class="text-muted" {{ request()->query('date-after') ? '' : 'selected' }}>
                            All Time
                        </option>
                        @foreach(['2016', '2017', '2018', '2019', '2020'] as $date_after)
                            <option value="{{ $date_after }}"
                                {{ request()->query('date-after') == $date_after ? 'selected' : '' }}
                            >
                                {{ $date_after }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </form>
    @include('components.movie.movie-page', ['movies' => $movies])
@endsection
