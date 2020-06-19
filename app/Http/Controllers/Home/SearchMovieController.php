<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Movie\Movie;
use App\Models\Movie\MovieCategory;
use App\Models\Movie\MovieGenre;
use Exception;
use Illuminate\Http\Request;
use View;

class SearchMovieController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        View::share('hots', Movie::hot()->take(8)->get());
        View::share('news', Movie::newRelease()->take(6)->get());
    }

    public function simpleSearch(Request $request)
    {
        $conditions = array();
        if ($request->query('query')) {
            array_push($conditions, ['name', 'like', '%' . $request->query('query') . '%']);
        }
        if ($request->query('category')) {
            array_push($conditions, ['movie_category_id', $request->query('category')]);
        }
        if ($request->query('language')) {
            array_push($conditions, ['movie_language_id', $request->query('language')]);
        }
        if ($request->query('nation')) {
            array_push($conditions, ['movie_nation_id', $request->query('nation')]);
        }
        if ($request->query('date-after')) {
            array_push($conditions, ['release_date', '>', $request->query('date-after') . '-01' . '-01']);
            array_push($conditions, ['release_date', '<', $request->query('date-after') . '-12' . '-12']);
        }

        $movies = Movie::where($conditions);

        if ($request->query('genre')) {
            $movies->whereHas('genres', function ($genres) use ($request) {
                $genres->where('id', $request->get('genre'));
            });
        }

        return view('home.search-movie', [
            'movies' => $movies->paginate(24)
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
            'movies' => $movies->paginate(24),
        ]);
    }
}
