<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Movie\Movie;
use View;

class NewMovieController extends Controller
{
    public function __construct()
    {
        $hotByDay = Movie::select()->orderBy('viewsByDay')->take(8)->get();
        View::share('hots', $hotByDay);
    }

    public function index()
    {
        return redirect('/new/release');
    }

    public function newByReleaseDate()
    {
        $movies = Movie::select()->orderBy('releaseDate')->paginate(24);
        return view('home.new-movie', [
            'by' => 'release',
            'movies' => $movies
        ]);
    }

    public function newByUpdateDate()
    {
        $movies = Movie::select()->orderBy('updatedAt')->paginate(24);
        return view('home.new-movie', [
            'by' => 'update',
            'movies' => $movies,
        ]);
    }
}
