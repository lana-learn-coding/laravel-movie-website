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
        $features = Movie::newFeatured()->limit(6)->get();
        $hots = Movie::hot()->limit(10)->get();
        $news = Movie::newUpdated()->limit(12)->get();
        $releases = Movie::newReleased()->limit(8)->get();
        return view('home.home', [
            'hots' => $hots,
            'features' => $features,
            'news' => $news,
            'releases' => $releases
        ]);
    }
}
