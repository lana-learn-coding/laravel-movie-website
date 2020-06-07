<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Movie\Movie;
use View;

class HotMovieController extends Controller
{
    public function __construct()
    {
        $newUpdateMovies = Movie::select()->orderBy('updatedAt')->take(8)->get();
        View::share('updates', $newUpdateMovies);
    }

    public function index()
    {
        $movies = Movie::select()->orderBy('viewsByAllTime')->paginate(24);
        return view('home.hot-movie', [
            'by' => 'all time',
            'movies' => $movies
        ]);
    }

    public function hotByDay()
    {
        $movies = Movie::select()->orderBy('viewsByDay')->paginate(24);
        return view('home.hot-movie', [
            'by' => 'day',
            'movies' => $movies
        ]);
    }

    public function hotByWeek()
    {
        $movies = Movie::select()->orderBy('viewsByWeek')->paginate(24);
        return view('home.hot-movie', [
            'by' => 'week',
            'movies' => $movies,
        ]);
    }

    public function hotByMonth()
    {
        $movies = Movie::select()->orderBy('viewsByMonth')->paginate(24);
        return view('home.hot-movie', [
            'by' => 'month',
            'movies' => $movies,
        ]);
    }
}
