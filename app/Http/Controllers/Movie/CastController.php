<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\BaseController;
use App\Models\Cast;
use App\Models\Movie\Movie;
use View;

class CastController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        View::share('hots', Movie::hot()->take(8)->get());
        View::share('news', Movie::newReleased()->take(6)->get());
    }

    function casts()
    {
        return view('movie.cast-list');
    }

    function castDetail($id)
    {
        $cast = Cast::findOrFail($id);
        $movies = $cast->movies()->paginate(12);
        return view('movie.cast-detail', [
            'cast' => $cast,
            'movies' => $movies,
        ]);
    }
}
