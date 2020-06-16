<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\BaseController;
use App\Models\Movie\Movie;
use View;

class HotMovieController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        View::share('updates', Movie::newUpdate()->take(8)->get());
    }

    public function index()
    {
        $movies = Movie::select()->orderBy('views_by_all_time')->paginate(24);
        return view('home.hot-movie', [
            'by' => 'all time',
            'movies' => $movies
        ]);
    }

    public function hotByDay()
    {
        $movies = Movie::select()->orderBy('views_by_day')->paginate(24);
        return view('home.hot-movie', [
            'by' => 'day',
            'movies' => $movies
        ]);
    }

    public function hotByWeek()
    {
        return view('home.hot-movie', [
            'by' => 'week',
            'movies' => Movie::hot()->paginate(24),
        ]);
    }

    public function hotByMonth()
    {
        $movies = Movie::select()->orderBy('views_by_month')->paginate(24);
        return view('home.hot-movie', [
            'by' => 'month',
            'movies' => $movies,
        ]);
    }
}
