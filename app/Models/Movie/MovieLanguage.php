<?php

namespace App\Models\Movie;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Movie\MovieLanguage
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property-read Collection|Movie[] $movies
 * @property-read int|null $movies_count
 * @method static Builder|MovieLanguage newModelQuery()
 * @method static Builder|MovieLanguage newQuery()
 * @method static Builder|MovieLanguage query()
 * @method static Builder|MovieLanguage whereCreatedAt($value)
 * @method static Builder|MovieLanguage whereId($value)
 * @method static Builder|MovieLanguage whereName($value)
 * @method static Builder|MovieLanguage whereUpdatedAt($value)
 * @mixin Eloquent
 */
class MovieLanguage extends Model
{
    protected array $fillable = [
        "name",
    ];

    function movies()
    {
        return $this->hasMany("App\Models\Movie\Movie");
    }
}
