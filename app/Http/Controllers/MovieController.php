<?php

namespace App\Http\Controllers;

use App\Models\Movie\Movie;
use View;

class MovieController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        View::share('hots', Movie::hot()->take(8)->get());
        View::share('news', Movie::newRelease()->take(6)->get());
    }

    function movie($id)
    {
        return view('movie.movie-detail', ['movie' => Movie::findOrFail($id)]);
    }

    function watchMovieIndex(int $id)
    {
        return redirect('/movies/' . $id . '/watch/1');
    }

    function watchMovie(int $id, int $ep)
    {
        $movie = Movie::findOrFail($id);
        $episode = $movie->episodes()->get()->firstWhere("number", "=", $ep);
        if ($episode === null) {
            abort(404);
        }
        return view('movie.movie-watch', [
            'movie' => $movie,
            'episode' => $episode
        ]);
    }
}
