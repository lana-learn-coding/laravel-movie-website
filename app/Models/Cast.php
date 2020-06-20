<?php

namespace App\Models;

use App\Models\Movie\Movie;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Cast
 *
 * @method static Builder|Cast newModelQuery()
 * @method static Builder|Cast newQuery()
 * @method static Builder|Cast query()
 * @mixin Eloquent
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $name
 * @property string|null $avatar
 * @property string|null $birth_date
 * @property-read Collection|Movie[] $movies
 * @property-read int|null $movies_count
 * @method static Builder|Cast whereAvatar($value)
 * @method static Builder|Cast whereBirthDate($value)
 * @method static Builder|Cast whereCreatedAt($value)
 * @method static Builder|Cast whereId($value)
 * @method static Builder|Cast whereName($value)
 * @method static Builder|Cast whereUpdatedAt($value)
 */
class Cast extends Model
{
    protected array $fillable = ['name', 'birth_date', 'avatar'];

    public function movies()
    {
        return $this->belongsToMany("App\Models\Movie\Movie");
    }
}
