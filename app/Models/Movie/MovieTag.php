<?php

namespace App\Models\Movie;

use App\Models\BaseModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * App\Models\Movie\MovieTag
 *
 * @property-read Collection|Movie[] $movies
 * @property-read int|null $movies_count
 * @method static Builder|MovieTag newModelQuery()
 * @method static Builder|MovieTag newQuery()
 * @method static Builder|MovieTag query()
 * @mixin Eloquent
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @method static Builder|MovieTag whereCreatedAt($value)
 * @method static Builder|MovieTag whereId($value)
 * @method static Builder|MovieTag whereName($value)
 * @method static Builder|MovieTag whereUpdatedAt($value)
 */
class MovieTag extends BaseModel
{
    protected $fillable = [
        "name"
    ];

    public function movies()
    {
        return $this->belongsToMany("App\Models\Movie\Movie");
    }
}
