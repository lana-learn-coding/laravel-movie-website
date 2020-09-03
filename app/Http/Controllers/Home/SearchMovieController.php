<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\BaseController;
use App\Models\Movie\Movie;
use Exception;
use Illuminate\Http\Request;
use View;

class SearchMovieController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        View::share('hots', Movie::hot()->take(8)->get());
        View::share('news', Movie::newUpdated()->take(6)->get());
    }

    public function simpleSearch(Request $request)
    {
        return view('home.search-movie', [
            'movies' => Movie::toPage(24)
        ]);
    }

    public function typeSearch(Request $request)
    {
        try {
            $movies = Movie::whereHas($request->query('type'), function ($type) use ($request) {
                $type->where('id', $request->query('id'));
            });
        } catch (Exception $e) {
            return abort(404);
        }

        return view('home.subtype', [
            'movies' => $movies->toPage(24),
        ]);
    }
}
