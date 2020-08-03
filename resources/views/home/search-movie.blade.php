@extends('layouts.main-app')
@section('content.header')
    <ol class="breadcrumb mb-md-4">
        <li class="breadcrumb-item text-info"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Search</li>
        <li class="ml-auto">
            <a href="#" class="hvr-grow-rotate" data-toggle="collapse" data-target="#filters">
                <i class="fas fa-filter"></i>
            </a>
        </li>
    </ol>
    <div class="collapse show" id="filters">
        <form method="GET" class="pb-4" id="filters-form">
            <input type="hidden" name="query" value="{{ request()->query('query') }}">
            <div class="form-row">
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="form-group">
                        @include('components.search-filter', ['name' => 'category', 'options' => $categories])
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="form-group">
                        @include('components.search-filter', ['name' => 'genre', 'options' => $genres])
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="form-group">
                        @include('components.search-filter', ['name' => 'language', 'options' => $languages])
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="form-group">
                        @include('components.search-filter', ['name' => 'nation', 'options' => $nations])
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="form-group">
                        @include('components.search-filter', ['name' => 'sort', 'options' => [
                            (object)['id' => 'name,asc', 'name' => 'Name A-Z'],
                            (object)['id' => 'name,desc', 'name' => 'Name Z-A'],
                            (object)['id' => 'release_date,desc', 'name' => 'New Release'],
                            (object)['id' => 'length,desc', 'name' => 'Most Length'],
                            (object)['id' => 'length,asc', 'name' => 'Least Length'],
                        ]])
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                    <div class="form-group form-group-sm">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" name="date_range"
                                   id="datepicker" placeholder="Date range..." style="font-size: 1rem"
                                   value="{{ request()->query('date_range') ?: '' }}">
                            <button type="button" id="clear-date-range"
                                    class="input-group-append btn btn-primary d-flex align-items-center">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('content.body')
    <div>
        <h4 class="mb-2">
            <span class="mr-1">Result for "{{ request()->query('query') ?: 'All Movies' }}"</span>
            <span class="small">({{ $movies->total() }})</span>
        </h4>
        <hr class="mt-2 mb-0 border-info">
    </div>
    @include('components.movie.movie-page', ['movies' => $movies])
@endsection

@scopedstyle('user.user-update')
<link rel="stylesheet" href="{{ asset('vendor/lib/flatpickr/flatpickr.min.css') }}">
@endscopedstyle

@scopedscript('user.user-update')
<script src="{{ asset('vendor/lib/flatpickr/flatpickr.js') }}"></script>
<script>
    const $flatpick = $('#datepicker').flatpickr({
        mode: "range",
        enableTime: false,
        dateFormat: 'Y-m-d',
        onClose: function (selectedDates, dateStr, instance) {
            if (dateStr.includes('to')) {
                $('#filters-form').submit();
            }
        }
    });
    $('#clear-date-range').on('click', function () {
        $flatpick.clear();
        $('#filters-form').submit();
    })

    function log() {
        console.log('hi');
    }
</script>
@endscopedscript
