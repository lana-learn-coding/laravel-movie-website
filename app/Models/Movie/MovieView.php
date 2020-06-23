<?php

namespace App\Models\Movie;

use App\Models\BaseModel;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Movie\MovieView
 *
 * @property int $id
 * @property string $date
 * @property int $view
 * @property int $movie_id
 * @property-read Movie $movie
 * @method static Builder|MovieView newModelQuery()
 * @method static Builder|MovieView newQuery()
 * @method static Builder|MovieView query()
 * @method static Builder|MovieView whereDate($value)
 * @method static Builder|MovieView whereId($value)
 * @method static Builder|MovieView whereMovieId($value)
 * @method static Builder|MovieView whereView($value)
 * @mixin Eloquent
 * @property int $count
 * @method static Builder|MovieView whereCount($value)
 */
class MovieView extends BaseModel
{
    public $timestamps = false;

    protected $fillable = [
        "count", "date"
    ];

    public function movie()
    {
        return $this->belongsTo("App\Models\Movie\Movie");
    }
}
