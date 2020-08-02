<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\Movie\MovieRating
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieRating query()
 * @mixin \Eloquent
 */
class MovieRating extends Pivot
{
    protected $fillable = ['rating'];

    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie\Movie');
    }
}
