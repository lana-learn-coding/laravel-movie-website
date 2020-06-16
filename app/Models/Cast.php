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
 */
class Cast extends Model
{
    protected $fillable = ['name', 'birth_date', 'avatar'];

    public function movies()
    {
        return $this->belongsToMany("App\Models\Movie\Movie");
    }
}
