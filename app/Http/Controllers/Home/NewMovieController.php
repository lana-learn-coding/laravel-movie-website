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
        $hotByDay = Movie::hotByDay()->take(8)->get();
        View::share('hots', $hotByDay);
    }

    public function index()
    {
        return redirect()->route('new.released');
    }

    public function newByReleaseDate()
    {
        return view('home.new-movie', [
            'by' => 'released',
            'movies' => Movie::newReleased()->paginate(24)
        ]);
    }

    public function newByUpdateDate()
    {
        return view('home.new-movie', [
            'by' => 'updated',
            'movies' => Movie::newUpdated()->paginate(24),
        ]);
    }

    public function newByCreateDate()
    {
        return view('home.new-movie', [
            'by' => 'created',
            'movies' => Movie::newCreated()->paginate(24),
        ]);
    }
}
