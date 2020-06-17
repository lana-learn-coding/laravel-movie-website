<?php

namespace App\Http\Controllers;

use App\Models\Movie\MovieCategory;
use App\Models\Movie\MovieGenre;
use App\Models\Movie\MovieLanguage;
use App\Models\Movie\MovieNation;
use View;

class BaseController extends Controller
{
    public function __construct()
    {
        View::share('categories', MovieCategory::all());
        View::share('genres', MovieGenre::all());
        View::share('languages', MovieLanguage::all());
        View::share('nations', MovieNation::all());
    }
}
