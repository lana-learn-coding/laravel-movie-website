<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\User\UserComment
 *
 * @property-read \App\Models\Movie\Movie $movie
 * @property-read \App\Models\User\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserComment query()
 * @mixin \Eloquent
 */
class UserComment extends Pivot
{
    public $incrementing = true;

    protected $table = 'movie_user_comment';

    protected $fillable = ['comment'];

    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie\Movie');
    }
}
