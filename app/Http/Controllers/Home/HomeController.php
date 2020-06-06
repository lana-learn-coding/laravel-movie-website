<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function root()
    {
        return redirect('/home');
    }

    public function home()
    {
        return view('home');
    }
}
