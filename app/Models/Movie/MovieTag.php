<?php

namespace App\Models\Movie;

use App\Models\BaseModel;
use App\Models\MovieCountable;

/**
 * App\Models\Movie\MovieTag
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\Movie[] $movies
 * @property-read int|null $movies_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieTag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\MovieTag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MovieTag extends BaseModel
{
    use MovieCountable;

    protected $fillable = [
        "name"
    ];

    public function movies()
    {
        return $this->belongsToMany("App\Models\Movie\Movie");
    }
}
