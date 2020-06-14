<?php

namespace App\Http\Controllers;

use App\Models\Movie\Movie;
use View;

class MovieController extends Controller
{

    public function __construct()
    {
        View::share('hots', Movie::hot()->take(8)->get());
        View::share('news', Movie::newRelease()->take(6)->get());
    }

    function movie($id)
    {
        return view('movie.movie-detail', ['movie' => Movie::findOrFail($id)]);
    }

    function watchMovieIndex(int $id)
    {
        return redirect('/movie/' . $id . '/watch/1');
    }

    function watchMovie(int $id, int $ep)
    {
        return view('movie.movie-watch', ['movie' => Movie::findOrFail($id)]);
    }
}
