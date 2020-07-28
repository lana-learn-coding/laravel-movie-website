<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\User\UserComment
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\UserComment[] $childComments
 * @property-read int|null $child_comments_count
 * @property-read \App\Models\Movie\Movie $movie
 * @property-read \App\Models\User\UserComment $parentComment
 * @property-read \App\Models\User\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserComment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserComment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserComment query()
 * @mixin \Eloquent
 */
class UserComment extends Pivot
{
    public $incrementing = true;

    protected $fillable = ['comment'];

    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie\Movie');
    }

    public function parentComment()
    {
        return $this->belongsTo('App\Models\User\UserComment');
    }

    public function childComments()
    {
        return $this->hasMany('App\Models\User\UserComment');
    }
}
