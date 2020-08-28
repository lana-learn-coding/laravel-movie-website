<?php

namespace App\Models\User;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\User\User
 *
 * @property int $id
 * @property string $username
 * @property string|null $avatar
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\Movie[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\Movie[] $favoriteMovies
 * @property-read int|null $favorite_movies_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\Movie[] $ratedMovies
 * @property-read int|null $rated_movies_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereUsername($value)
 * @mixin \Eloquent
 * @property-read \App\Models\User\UserDetail|null $detail
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function detail()
    {
        return $this->hasOne('App\Models\User\UserDetail');
    }

    public function favoriteMovies()
    {
        return $this->belongsToMany('App\Models\Movie\Movie', 'movie_user_favorite');
    }

    public function ratedMovies()
    {
        return $this->belongsToMany('App\Models\Movie\Movie', 'movie_user_rating')
            ->using('App\Models\Movie\MovieRating')
            ->withPivot(['rating'])
            ->withTimestamps();
    }

    public function comments()
    {
        return $this->belongsToMany('App\Models\Movie\Movie', 'movie_user_comment')
            ->using('App\Models\User\UserComment')
            ->withTimestamps();
    }
}
