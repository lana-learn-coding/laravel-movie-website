<?php

namespace App\Admin\Controllers;

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

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('avatar', __('Avatar'));
        $grid->column('birth_date', __('Birth date'));
        $grid->column('updated_at', __('Updated at'));

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
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('name', __('Name'));
        $show->field('avatar', __('Avatar'));
        $show->field('birth_date', __('Birth date'));

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

        $form->text('name', __('Name'));
        $form->image('avatar', __('Avatar'));
        $form->date('birth_date', __('Birth date'))->default(date('Y-m-d'));

        return $form;
    }
}
