<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BaseModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel query()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel toPage($size = 12)
 */
class BaseModel extends Model
{
    public function scopeToPage(Builder $query, int $size = 12)
    {
        $size = $this->getSizeOrDefault($size);
        $sort = $this->getSort();
        $direction = $this->getSortDirection();
        return $query->orderBy($sort, $direction)->paginate($size);
    }

    private function getSizeOrDefault(int $size)
    {
        if (request()->query('page_size')) {
            try {
                $size = intval(request()->query('page_size'));
            } catch (Exception $ignored) {
            }
        }
        if (!$size || $size < 1) {
            $size = 12;
        }
        return $size;
    }

    private function getSort()
    {
        $sort = explode(',', request()->query('sort') ?: '');
        if (sizeof($sort) < 1) {
            return '';
        }
        return $sort[0];
    }

    private function getSortDirection()
    {
        $default = 'asc';
        if (request()->query('sort_direction')) {
            return request()->query('sort_direction') === 'desc' ? 'desc' : $default;
        }
        $sort = explode(',', request()->query('sort') ?: '');
        if (sizeof($sort) < 2) {
            return $default;
        }
        return $sort[1] === 'desc' ? 'desc' : $default;
    }

    protected function isProd()
    {
        return in_array(getenv('APP_ENV'), ['prod', 'production']);
    }
}
