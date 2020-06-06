<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        "name", "releaseDate", "description", "image", "viewCount"
    ];

    public function categories()
    {
        return $this->belongsToMany("App\Models\Movie\MovieCategory");
    }

    public function episodes()
    {
        return $this->hasMany("App\Models\Movie\MovieEpisode");
    }
}
