<?php

namespace App\Models\Movie;

use App\Models\BaseModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * App\Models\Movie\MovieCategory
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property-read Collection|Movie[] $movies
 * @property-read int|null $movies_count
 * @method static Builder|MovieCategory newModelQuery()
 * @method static Builder|MovieCategory newQuery()
 * @method static Builder|MovieCategory query()
 * @method static Builder|MovieCategory whereCreatedAt($value)
 * @method static Builder|MovieCategory whereId($value)
 * @method static Builder|MovieCategory whereName($value)
 * @method static Builder|MovieCategory whereUpdatedAt($value)
 * @mixin Eloquent
 */
class MovieCategory extends BaseModel
{
    protected $fillable = [
        "name",
    ];

    function movies()
    {
        return $this->hasMany("App\Models\Movie\Movie");
    }
}
