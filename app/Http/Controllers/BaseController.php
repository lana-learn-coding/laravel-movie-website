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
        View::share('categories', MovieCategory::all()->map($this->addHref('category')));
        View::share('genres', MovieGenre::all()->map($this->addHref('genres')));
        View::share('languages', MovieLanguage::all()->map($this->addHref('language')));
        View::share('nations', MovieNation::all()->map($this->addHref('nation')));
    }

    public function addHref($type)
    {
        return function ($item) use ($type) {
            $item->setAttribute('href', route_with_query('type', [
                'type' => $type,
                'id' => $item->id,
                'name' => $item->name
            ]));
            return $item;
        };
    }
}
