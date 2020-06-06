<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;

class MovieCategory extends Model
{
    protected $fillable = [
        "name"
    ];

    public function movies()
    {
        return $this->belongsToMany("App\Models\Movie\Movie");
    }
}
