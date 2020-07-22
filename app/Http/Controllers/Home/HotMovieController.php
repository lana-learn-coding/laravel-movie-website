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
        $movies = Movie::hot()->paginate(24);
        return view('home.hot-movie', [
            'by' => 'all time',
            'movies' => $movies
        ]);
    }

    public function hotByDay()
    {
        $movies = Movie::hotByDay()->paginate(24);
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
        $movies = Movie::hotByMonth()->paginate(24);
        return view('home.hot-movie', [
            'by' => 'month',
            'movies' => $movies,
        ]);
    }
}
