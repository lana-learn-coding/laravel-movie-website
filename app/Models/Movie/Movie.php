<?php

namespace App\Models\Movie;

use App\Models\BaseModel;
use Fico7489\Laravel\EloquentJoin\Traits\EloquentJoin;

/**
 * App\Models\Movie\Movie
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $description
 * @property string|null $image
 * @property int|null $total_episodes
 * @property string $release_date
 * @property int $length
 * @property int|null $movie_category_id
 * @property int|null $movie_language_id
 * @property int|null $movie_nation_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cast[] $casts
 * @property-read int|null $casts_count
 * @property-read \App\Models\Movie\MovieCategory|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\User[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\MovieEpisode[] $episodes
 * @property-read int|null $episodes_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\User[] $favoritedByUsers
 * @property-read int|null $favorited_by_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\MovieGenre[] $genres
 * @property-read int|null $genres_count
 * @property-read mixed $episode_list
 * @property-read mixed $number_of_episodes
 * @property-read mixed $rating_by_percent
 * @property-read mixed $views_count_by_all_time
 * @property-read mixed $views_count_by_day
 * @property-read \App\Models\Movie\MovieLanguage|null $language
 * @property-read \App\Models\Movie\MovieNation|null $nation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\User[] $ratedByUsers
 * @property-read int|null $rated_by_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\MovieTag[] $tags
 * @property-read int|null $tags_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\MovieView[] $views
 * @property-read int|null $views_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie haveAnyEpisodes()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie hot()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie hotByDay()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie hotByMonth()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie hotByYear()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie newCreated()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie newFeatured()
 * @method static \Fico7489\Laravel\EloquentJoin\EloquentJoinBuilder|\App\Models\Movie\Movie newModelQuery()
 * @method static \Fico7489\Laravel\EloquentJoin\EloquentJoinBuilder|\App\Models\Movie\Movie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie newReleased()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie newUpdated()
 * @method static \Fico7489\Laravel\EloquentJoin\EloquentJoinBuilder|\App\Models\Movie\Movie query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereMovieCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereMovieLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereMovieNationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereTotalEpisodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel toPage($size = 12)
 */
class Movie extends BaseModel
{
    use EloquentJoin;

    protected $fillable = [
        'name', 'release_date', 'description', 'image', 'length', 'total_episodes'
    ];

    public function favoritedByUsers()
    {
        return $this->belongsToMany('App\Models\User\User', 'movie_user_favorite');
    }

    public function ratedByUsers()
    {
        return $this->belongsToMany('App\Models\User\User', 'movie_user_rating')
            ->using('App\Models\Movie\MovieRating')
            ->withPivot(['rating']);
    }

    public function comments()
    {
        return $this->belongsToMany('App\Models\User\User', 'movie_user_comment')
            ->using('App\Models\User\UserComment')
            ->withPivot(['comment']);
    }

    public function reports()
    {
        return $this->hasMany('App\Models\Movie\MovieReport');
    }

    public function trailers()
    {
        return $this->hasMany('App\Models\Movie\MovieTrailer');
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
        $maxRate = $this->ratedByUsers()->count('id') * 5 ?: 1;
        $rate = $this->ratedByUsers()->sum('rating');
        return ((double)$rate / $maxRate) * 100;
    }

    public function scopeNewReleased($query)
    {
        return $query->haveAnyTrailers()->orderBy('release_date', 'desc');
    }

    public function scopeNewUpdated($query)
    {
        return $query->haveAnyEpisodes()->orderByJoin('episodes.updated_at', 'desc');
    }

    public function scopeNewCreated($query)
    {
        return $query->haveAnyEpisodes()->orderByJoin('episodes.updated_at', 'asc');
    }

    public function scopeNewFeatured($query)
    {
        return $query->hotByYear()->orderByJoin('episodes.updated_at', 'desc');
    }

    public function scopeHot($query)
    {
        $now = date('Y-m-d');
        $sevenDayAgo = date('Y-m-d', strtotime('-7 days'));

        return $query->haveAnyEpisodes()->withCount(['views' => function ($query) use ($now, $sevenDayAgo) {
            return $query->whereBetween('date', [$sevenDayAgo, $now]);
        }])->orderByDesc('views_count');
    }

    public function scopeHotByDay($query)
    {
        $now = date('Y-m-d');
        $oneDayAgo = date('Y-m-d', strtotime('-1 day'));

        return $query->haveAnyEpisodes()->withCount(['views' => function ($query) use ($now, $oneDayAgo) {
            return $query->whereBetween('date', [$oneDayAgo, $now]);
        }])->orderByDesc('views_count');
    }

    public function scopeHotByMonth($query)
    {
        $now = date('Y-m-d');
        $monthAgo = date('Y-m-d', strtotime('-1 month'));

        return $query->haveAnyEpisodes()->withCount(['views' => function ($query) use ($now, $monthAgo) {
            return $query->whereBetween('date', [$monthAgo, $now]);
        }])->orderByDesc('views_count');
    }

    public function scopeHotByYear($query)
    {
        $now = date('Y-m-d');
        $yearAgo = date('Y-m-d', strtotime('-1 year'));

        return $query->haveAnyEpisodes()->withCount(['views' => function ($query) use ($now, $yearAgo) {
            return $query->whereBetween('date', [$yearAgo, $now]);
        }])->orderByDesc('views_count');
    }

    public function scopeHaveAnyEpisodes($query)
    {
        if ($this->isProd()) {
            return $query->has('episodes');
        }
        return $query;
    }

    public function scopeHaveAnyTrailers($query)
    {
        if ($this->isProd()) {
            return $query->has('episodes');
        }
        return $query;
    }

    public function isFavoritedBy($userId)
    {
        return $this->favoritedByUsers()->where('id', $userId)->exists();
    }

    public function ratedBy($userId)
    {
        $user = $this->ratedByUsers()->where('id', $userId)->first();
        if ($user) {
            return (int)$user->pivot->rating;
        }
        return null;
    }

    public function isReported($form, $episode)
    {
        return $this->reports()
            ->where('from', $form)
            ->where('episode', $episode)
            ->exists();
    }
}
