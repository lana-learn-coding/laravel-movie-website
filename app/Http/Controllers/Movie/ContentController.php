<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Http\VideoStream;

class ContentController extends Controller
{
    function stream($path)
    {
        $file = storage_path('app/public') . DIRECTORY_SEPARATOR . $path;

        if (!file_exists($file)) {
            abort(404);
        }

        $stream = new VideoStream($file);
        return response()->stream(function () use ($stream) {
            $stream->start();
        });
    }
}
