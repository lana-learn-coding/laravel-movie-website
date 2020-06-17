<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cast
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cast newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cast newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cast query()
 * @mixin \Eloquent
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $avatar
 * @property string|null $birth_date
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Movie\Movie[] $movies
 * @property-read int|null $movies_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cast whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cast whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cast whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cast whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cast whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Cast whereUpdatedAt($value)
 */
class Cast extends Model
{
    protected $fillable = ['name', 'birth_date', 'avatar'];

    public function movies()
    {
        return $this->belongsToMany("App\Models\Movie\Movie");
    }
}
