<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;

class MovieEpisode extends Model
{
    protected $fillable = [
        "name", "number"
    ];

    public function movie()
    {
        return $this->belongsTo("App\Models\Movie\Movie");
    }
}
