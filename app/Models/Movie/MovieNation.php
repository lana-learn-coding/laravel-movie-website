<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;

class MovieNation extends Model
{
    protected $fillable = [
        "name",
    ];

    function movies()
    {
        return $this->hasMany("App\Models\Movie\Movie");
    }
}
