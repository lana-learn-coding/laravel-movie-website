<?php

namespace App\Models\Movie;

use App\Models\BaseModel;
use App\Models\MovieCountable;

/**
 * App\Models\Movie\MovieCategory
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\Movie[] $movies
 * @property-read int|null $movies_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieCategory manyMovie($count = 0)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel toPage($size = 12)
 */
class MovieCategory extends BaseModel
{
    use MovieCountable;

    protected $fillable = [
        "name",
    ];

    function movies()
    {
        return $this->hasMany("App\Models\Movie\Movie");
    }
}
