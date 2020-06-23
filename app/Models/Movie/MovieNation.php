<?php

namespace App\Models\Movie;

use App\Models\BaseModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * App\Models\Movie\MovieNation
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property-read Collection|Movie[] $movies
 * @property-read int|null $movies_count
 * @method static Builder|MovieNation newModelQuery()
 * @method static Builder|MovieNation newQuery()
 * @method static Builder|MovieNation query()
 * @method static Builder|MovieNation whereCreatedAt($value)
 * @method static Builder|MovieNation whereId($value)
 * @method static Builder|MovieNation whereName($value)
 * @method static Builder|MovieNation whereUpdatedAt($value)
 * @mixin Eloquent
 */
class MovieNation extends BaseModel
{
    protected $fillable = [
        "name",
    ];

    function movies()
    {
        return $this->hasMany("App\Models\Movie\Movie");
    }
}
