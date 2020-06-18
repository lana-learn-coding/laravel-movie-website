<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Movie\Movie
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $description
 * @property string|null $releaseDate
 * @property string|null $image
 * @property int $viewCount
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\MovieGenre[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\MovieEpisode[] $episodes
 * @property-read int|null $episodes_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereViewCount($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\MovieTag[] $tags
 * @property-read int|null $tags_count
 * @property string $release_date
 * @property string $length
 * @property-read mixed $views_by_day
 * @property-read mixed $views_by_month
 * @property-read mixed $views_by_week
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\MovieView[] $views
 * @property-read int|null $views_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereLength($value)
 * @property int|null $movie_category_id
 * @property-read \App\Models\Movie\MovieCategory $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\MovieCategory[] $genres
 * @property-read int|null $genres_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereMovieCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie hot()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie new()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie newUpdate()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie newRelease()
 * @property-read mixed $number_of_episodes
 * @property int|null $movie_language_id
 * @property int|null $movie_nation_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cast[] $casts
 * @property-read int|null $casts_count
 * @property-read \App\Models\Movie\MovieLanguage $language
 * @property-read \App\Models\Movie\MovieNation $nation
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereMovieLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Movie\Movie whereMovieNationId($value)
 */
class Movie extends Model
{
    protected $fillable = [
        "name", "release_date", "description", "image", "length",
    ];

    function getNumberOfEpisodesAttribute()
    {
        return $this->views()->count('id');
    }

    // TODO: query view from view table;
    public function getViewsByDayAttribute()
    {
        return 100;
    }

    public function getViewsByWeekAttribute()
    {
        return 100;
    }

    public function getViewsByMonthAttribute()
    {
        return 100;
    }

    public function scopeNewRelease($query)
    {
        return $query->orderBy("release_date");
    }

    public function scopeNewUpdate($query)
    {
        return $query->orderBy("updated_at");
    }

    public function scopeHot($query)
    {
        return $query->orderBy("views_by_week");
    }

    public function casts()
    {
        return $this->belongsToMany("App\Models\Cast");
    }

    public function views()
    {
        return $this->hasMany("App\Models\Movie\MovieView");
    }

    public function tags()
    {
        return $this->belongsToMany("App\Models\Movie\MovieTag");
    }

    public function genres()
    {
        return $this->belongsToMany("App\Models\Movie\MovieGenre");
    }

    public function episodes()
    {
        return $this->hasMany("App\Models\Movie\MovieEpisode");
    }

    public function category()
    {
        return $this->belongsTo("App\Models\Movie\MovieCategory", "movie_category_id");
    }

    public function nation()
    {
        return $this->belongsTo("App\Models\Movie\MovieNation", "movie_nation_id");
    }

    public function language()
    {
        return $this->belongsTo("App\Models\Movie\MovieLanguage", "movie_language_id");
    }
}
