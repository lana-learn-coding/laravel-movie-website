<?php

namespace App\Models\Movie;

use App\Models\BaseModel;

/**
 * App\Models\Movie\MovieEpisode
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $name
 * @property int $number
 * @property string $file
 * @property int $quality
 * @property int $movie_id
 * @property-read \App\Models\Movie\Movie $movie
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereQuality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieEpisode whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel toPage($size = 12)
 */
class MovieEpisode extends BaseModel
{
    protected $fillable = [
        "name", "number", "quality", "file"
    ];

    public function movie()
    {
        return $this->belongsTo("App\Models\Movie\Movie");
    }
}
