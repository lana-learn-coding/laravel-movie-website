<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BaseModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BaseModel toPage($size, $columns = [], $pageName = 'page', $sizeName = 'size')
 * @mixin \Eloquent
 */
class BaseModel extends Model
{
    public function scopeToPage(Builder $query, $size, $columns = ['*'], $pageName = 'page', $sizeName = 'size')
    {
        $size = $this->getSizeOrDefault($size, $sizeName);
        return $query->filterable()->sortable()->paginate($size, $columns, $pageName);
    }

    private function getSizeOrDefault(int $size, $sizeName = 'size')
    {
        $size = $size ?: intval(request()->query($sizeName));
        if (!$size || $size < 1) {
            $size = 12;
        }
        return $size;
    }

    protected function scopeSortable($query)
    {
        $sort = explode(',', request()->query('sort') ?: '');
        if (sizeof($sort) < 1) {
            return $query;
        }
        $sort = $sort[0];

        if (request()->query('direction')) {
            $direction = request()->query('direction') === 'desc' ? 'desc' : 'asc';
        } else {
            $directionParam = explode(',', request()->query('sort') ?: '');
            if (sizeof($directionParam) < 2) {
                $direction = 'asc';
            } else {
                $direction = $directionParam[1] === 'desc' ? 'desc' : 'asc';
            }
        }

        return $query->orderBy($sort, $direction);
    }

    protected function scopeFilterable($query)
    {
        return $query;
    }

    protected function isProd()
    {
        return in_array(getenv('APP_ENV'), ['prod', 'production']);
    }
}
