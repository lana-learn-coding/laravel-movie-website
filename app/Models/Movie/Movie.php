<?php

namespace App\Models\Movie;

use App\Models\BaseModel;
use App\Models\Cast;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * App\Models\Movie\Movie
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property string|null $description
 * @property string|null $releaseDate
 * @property string|null $image
 * @property int $viewCount
 * @property-read Collection|MovieGenre[] $categories
 * @property-read int|null $categories_count
 * @property-read Collection|MovieEpisode[] $episodes
 * @property-read int|null $episodes_count
 * @method static Builder|Movie newModelQuery()
 * @method static Builder|Movie newQuery()
 * @method static Builder|Movie query()
 * @method static Builder|Movie whereCreatedAt($value)
 * @method static Builder|Movie whereDescription($value)
 * @method static Builder|Movie whereId($value)
 * @method static Builder|Movie whereImage($value)
 * @method static Builder|Movie whereName($value)
 * @method static Builder|Movie whereReleaseDate($value)
 * @method static Builder|Movie whereUpdatedAt($value)
 * @method static Builder|Movie whereViewCount($value)
 * @mixin Eloquent
 * @property-read Collection|MovieTag[] $tags
 * @property-read int|null $tags_count
 * @property string $release_date
 * @property string $length
 * @property-read mixed $views_by_day
 * @property-read mixed $views_by_month
 * @property-read mixed $views_by_week
 * @property-read Collection|MovieView[] $views
 * @property-read int|null $views_count
 * @method static Builder|Movie whereLength($value)
 * @property int|null $movie_category_id
 * @property-read MovieCategory $category
 * @property-read Collection|MovieCategory[] $genres
 * @property-read int|null $genres_count
 * @method static Builder|Movie whereMovieCategoryId($value)
 * @method static Builder|Movie hot()
 * @method static Builder|Movie new()
 * @method static Builder|Movie newUpdate()
 * @method static Builder|Movie newRelease()
 * @property-read mixed $number_of_episodes
 * @property int|null $movie_language_id
 * @property int|null $movie_nation_id
 * @property-read Collection|Cast[] $casts
 * @property-read int|null $casts_count
 * @property-read MovieLanguage $language
 * @property-read MovieNation $nation
 * @method static Builder|Movie whereMovieLanguageId($value)
 * @method static Builder|Movie whereMovieNationId($value)
 * @property int|null $total_episodes
 * @property-read mixed $episode_list
 * @property-read mixed $views_by_all_time
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereTotalEpisodes($value)
 * @property-read mixed $views_count_by_all_time
 * @property-read mixed $views_count_by_day
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie hotByDay()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie hotByMonth()
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\User[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\User[] $favorites
 * @property-read int|null $favorites_count
 * @property-read mixed $rating_by_percent
 */
class Movie extends BaseModel
{
    protected $fillable = [
        'name', 'release_date', 'description', 'image', 'length', 'total_episodes'
    ];

    public function favorites()
    {
        return $this->belongsToMany('App\Models\User\User', 'movie_user_favorite');
    }

    public function comments()
    {
        return $this->belongsToMany('App\Models\User\User', 'movie_user_comment')->using('App\Models\User\UserComment');
    }

    public function casts()
    {
        return $this->belongsToMany('App\Models\Cast');
    }

    public function views()
    {
        return $this->hasMany('App\Models\Movie\MovieView');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Movie\MovieTag');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Models\Movie\MovieGenre');
    }

    public function episodes()
    {
        return $this->hasMany('App\Models\Movie\MovieEpisode');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Movie\MovieCategory', 'movie_category_id');
    }

    public function nation()
    {
        return $this->belongsTo('App\Models\Movie\MovieNation', 'movie_nation_id');
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Movie\MovieLanguage', 'movie_language_id');
    }

    public function getEpisodeListAttribute()
    {
        return $this->episodes()->get()->unique('number');
    }

    function getNumberOfEpisodesAttribute()
    {
        return $this->episodes()->get()->unique('number')->count();
    }

    public function getViewsCountByDayAttribute()
    {
        $oneDayAgo = date('Y-m-d', strtotime('-1 day'));
        return $this->views()
            ->whereBetween('date', [$oneDayAgo, date('Y-m-d')])
            ->sum('count');
    }

    public function getViewsCountByAllTimeAttribute()
    {
        return $this->views()->sum('count');
    }

    public function getRatingByPercentAttribute()
    {
        return 70;
    }

    public function scopeNewRelease($query)
    {
        return $query->orderBy('release_date');
    }

    public function scopeNewUpdate($query)
    {
        return $query->orderBy('updated_at');
    }

    public function scopeHot($query)
    {
        $now = date('Y-m-d');
        $sevenDayAgo = date('Y-m-d', strtotime('-7 days'));

        return $query->withCount(['views' => function ($query) use ($now, $sevenDayAgo) {
            return $query->whereBetween('date', [$sevenDayAgo, $now]);
        }])->orderByDesc('views_count');
    }

    public function scopeHotByDay($query)
    {
        $now = date('Y-m-d');
        $oneDayAgo = date('Y-m-d', strtotime('-1 day'));

        return $query->withCount(['views' => function ($query) use ($now, $oneDayAgo) {
            return $query->whereBetween('date', [$oneDayAgo, $now]);
        }])->orderByDesc('views_count');
    }

    public function scopeHotByMonth($query)
    {
        $now = date('Y-m-d');
        $monthAgo = date('Y-m-d', strtotime('-1 month'));

        return $query->withCount(['views' => function ($query) use ($now, $monthAgo) {
            return $query->whereBetween('date', [$monthAgo, $now]);
        }])->orderByDesc('views_count');
    }
}
