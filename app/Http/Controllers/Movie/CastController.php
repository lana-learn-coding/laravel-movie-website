<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\BaseController;
use App\Models\Cast;
use App\Models\Movie\Movie;
use Illuminate\Http\Request;
use View;

class CastController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        View::share('hots', Movie::hot()->take(8)->get());
        View::share('news', Movie::newUpdated()->take(6)->get());
    }

    function casts(Request $request)
    {
        $casts = Cast::where('name', 'like', '%' . $request->query('name') . '%')->toPage(24);
        return view('movie.cast-list', [
            'casts' => $casts
        ]);
    }

    function castDetail($id)
    {
        $cast = Cast::findOrFail($id);
        $movies = $cast->movies()->toPage(12);
        return view('movie.cast-detail', [
            'cast' => $cast,
            'movies' => $movies,
        ]);
    }
}
