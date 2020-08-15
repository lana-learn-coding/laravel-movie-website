<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;

class MovieTrailer extends Model
{
    protected $fillable = [
        "name", "quality", "file"
    ];

    public function movie()
    {
        return $this->belongsTo("App\Models\Movie\Movie");
    }
}
