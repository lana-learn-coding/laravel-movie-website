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
 * @method static Builder|MovieGenre newModelQuery()
 * @method static Builder|MovieGenre newQuery()
 * @method static Builder|MovieGenre query()
 * @method static Builder|MovieGenre whereCreatedAt($value)
 * @method static Builder|MovieGenre whereId($value)
 * @method static Builder|MovieGenre whereName($value)
 * @method static Builder|MovieGenre whereUpdatedAt($value)
 * @mixin Eloquent
 */
class MovieGenre extends BaseModel
{
    protected $fillable = [
        "name"
    ];

    public function movies()
    {
        return $this->belongsToMany("App\Models\Movie\Movie");
    }
}
