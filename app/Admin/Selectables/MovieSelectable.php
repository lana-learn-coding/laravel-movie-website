<?php


namespace App\Admin\Selectables;


use App\Models\Movie\Movie;
use Encore\Admin\Grid\Selectable;

class MovieSelectable extends Selectable
{
    public $model = Movie::class;

    public function make()
    {
        $this->column('id', __('Id'))->hide()->sortable();
        $this->column('image', __('Cover'))->image()->hide();
        $this->column('name', __('Name'))->sortable();
        $this->column('genres', __('Genres'))->pluck('name')->label();
        $this->column('description', __('Description'))->hide();
        $this->column('updated_at', __('Updated at'))->hide()->sortable();

        $this->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->like('name', __('Name'));
            $filter->between('updated_at', __('Updated At'))->date();
        });
    }
}
