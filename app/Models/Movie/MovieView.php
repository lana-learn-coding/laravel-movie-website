<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Movie\MovieView
 *
 * @property int $id
 * @property string $date
 * @property int $view
 * @property int $movie_id
 * @property-read \App\Models\Movie\Movie $movie
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieView newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieView newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieView query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieView whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieView whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieView whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieView whereView($value)
 * @mixin \Eloquent
 */
class MovieView extends Model
{
    protected $fillable = [
        "view", "date"
    ];

    public function movie()
    {
        return $this->belongsTo("App\Models\Movie\Movie");
    }
}
