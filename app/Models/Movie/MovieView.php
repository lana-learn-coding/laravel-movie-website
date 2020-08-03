<?php

namespace App\Models\Movie;

use App\Models\BaseModel;

/**
 * App\Models\Movie\MovieView
 *
 * @property int $id
 * @property string $date
 * @property int $count
 * @property int $movie_id
 * @property-read \App\Models\Movie\Movie $movie
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieView newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieView newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieView query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieView whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieView whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieView whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieView whereMovieId($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel toPage($size = 12)
 */
class MovieView extends BaseModel
{
    public $timestamps = false;

    protected $fillable = [
        "count", "date"
    ];

    public function movie()
    {
        return $this->belongsTo("App\Models\Movie\Movie");
    }
}
