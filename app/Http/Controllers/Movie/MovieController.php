<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\BaseController;
use App\Models\Movie\Movie;
use Auth;
use Illuminate\Http\Request;
use View;

class MovieController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        View::share('hots', Movie::hot()->take(8)->get());
        View::share('news', Movie::newUpdated()->take(6)->get());
        $this->middleware('auth')->only([
            'removeFavoriteMovie',
            'favoriteMovie',
            'writeComment',
            'rateMovie'
        ]);
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

    function removeFavoriteMovie(int $id)
    {
        Auth::user()->favoriteMovies()->detach($id);
        return back();
    }

    function bumpMovieViewsCount(int $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->views()->create([
            'date' => date('Y-m-d', time()),
            'count' => 1
        ])->save();
        return response('', 200);
    }

    function writeComment(Request $request, int $id)
    {
        $request->validate([
            'comment' => 'not_regex:/^\s*$/',
        ]);
        Auth::user()->comments()->attach($id, [
            'comment' => $request->input('comment'),
        ]);
        return back();
    }

    function rateMovie(Request $request, int $id)
    {
        $request->validate([
            'rating' => 'integer|min:1|max:5',
        ]);
        Auth::user()->ratedMovies()->detach($id);
        Auth::user()->ratedMovies()->attach($id, [
            'rating' => $request->input('rating')
        ]);
        return back();
    }
}
