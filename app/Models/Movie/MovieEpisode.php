<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Movie\MovieEpisode
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $name
 * @property int $number
 * @property int $movie_id
 * @property-read \App\Models\Movie\Movie $movie
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $high
 * @property string $medium
 * @property string $low
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereHigh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereLow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereMedium($value)
 */
class MovieEpisode extends Model
{
    protected $fillable = [
        "name", "number", "high", "medium", "low",
    ];

    public function movie()
    {
        return $this->belongsTo("App\Models\Movie\Movie");
    }
}
