<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Movie\Movie;
use App\Models\Movie\MovieCategory;
use App\Models\Movie\MovieGenre;
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
            array_push($conditions, ['category_id', '=', $request->query('category')]);
        }
        if ($request->query('genre')) {
            array_push($conditions, ['genre_id', '=', $request->query('genre')]);
        }
        if ($request->query('date-after')) {
            array_push($conditions, ['release_date', '>', $request->query('date-after') . '-01' . '-01']);
            array_push($conditions, ['release_date', '<', $request->query('date-after') . '-12' . '-12']);
        }
        return view('home.search-movie', [
            'movies' => Movie::where($conditions)
                ->paginate(24)
        ]);
    }
}
