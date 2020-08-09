<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\UserDetail
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property string|null $name
 * @property string|null $gender
 * @property string|null $birth_date
 * @property-read \App\Models\User\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserDetail whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserDetail whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserDetail whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\UserDetail whereUserId($value)
 * @mixin \Eloquent
 */
class UserDetail extends Model
{
    protected $fillable = ['name', 'birth_date', 'gender'];

    public function user()
    {
        return $this->belongsTo('App\Models\User\User');
    }
}
