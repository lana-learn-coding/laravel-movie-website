<?php


namespace App\Models;


trait MovieCountable
{
    public function getMoviesCountAttribute()
    {
        return $this->movies()->count('id');
    }

    public function scopeManyMovie($query, $count = 0)
    {
        return $query->withCount('movies')->where('movies_count', '>=', $count);
    }
}
