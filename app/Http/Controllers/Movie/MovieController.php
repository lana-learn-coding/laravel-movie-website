<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\BaseController;
use App\Models\Movie\Movie;
use Auth;
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
        $episodes = $movie->episodes()->get()
            ->where('number', '=', $ep)
            ->unique('quality')
            ->sortByDesc('quality');

        if ($episodes->isEmpty()) {
            abort(404);
        }

        return view('movie.movie-watch', [
            'movie' => $movie,
            'episodes' => $episodes
        ]);
    }

    function favoriteMovie(int $id)
    {
        if (Movie::where('id', $id)->exists()) {
            Auth::user()->favoriteMovies()->attach($id);
        }
        return back();
    }

    function unFavoriteMovie(int $id)
    {
        Auth::user()->favoriteMovies()->detach($id);
        return back();
    }

    function bumpMovieViewsCount(int $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->favorites();
        return response('', 200);
    }
}
