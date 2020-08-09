<?php


namespace App\Admin\Selectables;


use App\Models\Cast;
use Encore\Admin\Grid;
use Encore\Admin\Grid\Selectable;

class CastSelectable extends Selectable
{
    public $model = Cast::class;

    public function make()
    {
        $this->column('id', __('Id'))->sortable()->hide();
        $this->column('name', __('Name'))->sortable();
        $this->column('avatar', __('Avatar'))->image();
        $this->column('birth_date', __('Birth date'))->sortable();
        $this->column('updated_at', __('Updated at'))->sortable()->hide();
        $this->column('created_at', __('Updated at'))->sortable()->hide();

        $this->filter(function (Grid\Filter $filter) {
            $filter->like('name', __('Name'));
        });
    }
}
