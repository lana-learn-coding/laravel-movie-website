<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Movie\Movie;
use View;

class NewMovieController extends Controller
{
    public function __construct()
    {
        $hotByDay = Movie::orderBy('viewsByDay')->take(8)->get();
        View::share('hots', $hotByDay);
    }

    public function index()
    {
        return redirect('/new/release');
    }

    public function newByReleaseDate()
    {
        return view('home.new-movie', [
            'by' => 'release',
            'movies' => Movie::newRelease()->paginate(24)
        ]);
    }

    public function newByUpdateDate()
    {
        return view('home.new-movie', [
            'by' => 'update',
            'movies' => Movie::newUpdate()->paginate(24),
        ]);
    }
}
