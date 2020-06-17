<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Movie\MovieNation
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\Movie[] $movies
 * @property-read int|null $movies_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieNation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieNation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieNation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieNation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieNation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieNation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieNation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MovieNation extends Model
{
    protected $fillable = [
        "name",
    ];

    function movies()
    {
        return $this->hasMany("App\Models\Movie\Movie");
    }
}
