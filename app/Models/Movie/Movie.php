<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Movie\Movie
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $description
 * @property string|null $releaseDate
 * @property string|null $image
 * @property int $viewCount
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\MovieCategory[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\MovieEpisode[] $episodes
 * @property-read int|null $episodes_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereViewCount($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\MovieTag[] $tags
 * @property-read int|null $tags_count
 */
class Movie extends Model
{
    protected $fillable = [
        "name", "releaseDate", "description", "image", "viewCount"
    ];

    public function tags()
    {
        return $this->belongsToMany("App\Models\Movie\MovieTag");
    }

    public function categories()
    {
        return $this->belongsToMany("App\Models\Movie\MovieCategory");
    }

    public function episodes()
    {
        return $this->hasMany("App\Models\Movie\MovieEpisode");
    }
}
