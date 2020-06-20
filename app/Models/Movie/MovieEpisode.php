<?php

namespace App\Models\Movie;

use App\Models\BaseModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

/**
 * App\Models\Movie\MovieEpisode
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 * @property int $number
 * @property int $movie_id
 * @property-read Movie $movie
 * @method static Builder|MovieEpisode newModelQuery()
 * @method static Builder|MovieEpisode newQuery()
 * @method static Builder|MovieEpisode query()
 * @method static Builder|MovieEpisode whereCreatedAt($value)
 * @method static Builder|MovieEpisode whereId($value)
 * @method static Builder|MovieEpisode whereMovieId($value)
 * @method static Builder|MovieEpisode whereName($value)
 * @method static Builder|MovieEpisode whereNumber($value)
 * @method static Builder|MovieEpisode whereUpdatedAt($value)
 * @mixin Eloquent
 * @property string $high
 * @property string $medium
 * @property string $low
 * @method static Builder|MovieEpisode whereHigh($value)
 * @method static Builder|MovieEpisode whereLow($value)
 * @method static Builder|MovieEpisode whereMedium($value)
 */
class MovieEpisode extends BaseModel
{
    protected array $fillable = [
        "name", "number", "high", "medium", "low",
    ];

    public function movie()
    {
        return $this->belongsTo("App\Models\Movie\Movie");
    }
}
