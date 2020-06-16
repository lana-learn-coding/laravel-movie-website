<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\BaseController;
use App\Models\Movie\Movie;

class HomeController extends BaseController
{
    public function root()
    {
        return redirect('/home');
    }

    public function home()
    {
        $features = Movie::select()->orderBy('updated_at')->limit(6)->get();
        $hots = Movie::select()->orderBy('views_by_week')->limit(10)->get();
        $news = Movie::select()->orderBy('release_date')->limit(12)->get();
        $random = Movie::select()->inRandomOrder()->limit(12)->get();
        return view('home.home', [
            'hots' => $hots,
            'features' => $features,
            'news' => $news,
            'random' => $random,
        ]);
    }
}
