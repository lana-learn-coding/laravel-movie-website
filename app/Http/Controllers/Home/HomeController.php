<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Movie\Movie;

class HomeController extends Controller
{
    public function root()
    {
        return redirect('/home');
    }

    public function home()
    {
        $features = Movie::select()->orderBy('updatedAt')->limit(6)->get();
        $hots = Movie::select()->orderBy('viewsByWeek')->limit(10)->get();
        $news = Movie::select()->orderBy('releaseDate')->limit(12)->get();
        $random = Movie::select()->inRandomOrder()->limit(12)->get();
        return view('home.home', [
            'hots' => $hots,
            'features' => $features,
            'news' => $news,
            'random' => $random,
        ]);
    }
}
