<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;

class MovieReport extends Model
{
    protected $fillable = [
        'episode', 'reason', 'from'
    ];

    function movie()
    {
        return $this->belongsTo("App\Models\Movie\Movie");
    }
}
