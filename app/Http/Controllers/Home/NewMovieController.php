<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\BaseController;
use App\Models\Movie\Movie;
use View;

class NewMovieController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $hotByDay = Movie::orderBy('views_by_day')->take(8)->get();
        View::share('hots', $hotByDay);
    }

    public function index()
    {
        return redirect('/new/release');
    }

    public function newByReleaseDate()
    {
        return view('home.new-movie', [
            'by' => 'release',
            'movies' => Movie::newRelease()->paginate(24)
        ]);
    }

    public function newByUpdateDate()
    {
        return view('home.new-movie', [
            'by' => 'update',
            'movies' => Movie::newUpdate()->paginate(24),
        ]);
    }
}
