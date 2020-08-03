<?php

namespace App\Admin\Controllers;

use App\Admin\Selectables\MovieSelectable;
use App\Models\Cast;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CastController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Cast';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Cast());

        $grid->model()->withCount('movies');

        $grid->column('id', __('Id'))->sortable()->hide();
        $grid->column('name', __('Name'))->sortable();
        $grid->column('avatar', __('Avatar'))->image();
        $grid->column('birth_date', __('Birth date'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable()->hide();
        $grid->column('created_at', __('Updated at'))->sortable()->hide();
        $grid->column('movies_count', 'Movies count')->sortable();

        $grid->filter(function (Grid\Filter $filter) {
            $filter->disableIdFilter();
            $filter->like('name', __('Name'));
            $filter->between('updated_at', __('Updated At'))->date();
            $filter->where(function ($query) {
                $query->manyMovie(intval("{$this->input}"));
            }, __('Movies count'))->decimal(['rightAlign' => false, 'radixPoint' => '']);
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Cast::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('updated_at', __('Updated at'));
        $show->field('name', __('Name'));
        $show->field('avatar', __('Avatar'));
        $show->field('birth_date', __('Birth date'));

        $show->movies('Movies', function (Grid $movies) {
            $movies->resource('/admin/movies');

            $movies->id()->hide();
            $movies->image()->hide();
            $movies->name()->sortable();
            $movies->genres()->pluck('name')->label();
            $movies->description()->hide();
            $movies->updated_at()->sortable();

            $movies->filter(function ($filter) {
                $filter->disableIdFilter();
                $filter->like('name', __('Name'));
                $filter->between('updated_at', __('Updated At'))->date();
            });

            $movies->disableBatchActions();
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Cast());

        $form->text('name', __('Name'))->required();
        $form->cropper('avatar', __('Avatar'))->cRatio(200, 250)->crop(200, 250);
        $form->date('birth_date', __('Birth date'))->default(date('Y-m-d'))->required();

        $form->belongsToMany('movies', MovieSelectable::class, __('Movies'));

        return $form;
    }
}
