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
        View::share('updates', Movie::newUpdated()->take(8)->get());
    }

    public function index()
    {
        $movies = Movie::hot()->toPage(24);
        return view('home.hot-movie', [
            'by' => 'all time',
            'movies' => $movies
        ]);
    }

    public function hotByDay()
    {
        $movies = Movie::hotByDay()->toPage(24);
        return view('home.hot-movie', [
            'by' => 'day',
            'movies' => $movies
        ]);
    }

    public function hotByWeek()
    {
        return view('home.hot-movie', [
            'by' => 'week',
            'movies' => Movie::hot()->toPage(24),
        ]);
    }

    public function hotByMonth()
    {
        $movies = Movie::hotByMonth()->toPage(24);
        return view('home.hot-movie', [
            'by' => 'month',
            'movies' => $movies,
        ]);
    }
}
