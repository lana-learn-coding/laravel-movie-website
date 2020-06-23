<?php

namespace App\Admin\Controllers\Movie;

use App\Models\Movie\Movie;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MovieController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Movie';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Movie());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('release_date', __('Release date'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('length', __('Length'));
        $grid->column('movie_category_id', __('Movie category id'));
        $grid->column('movie_language_id', __('Movie language id'));
        $grid->column('movie_nation_id', __('Movie nation id'));
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
        $show = new Show(Movie::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('image', __('Image'));
        $show->field('release_date', __('Release date'));
        $show->field('length', __('Length'));
        $show->field('movie_category_id', __('Movie category id'));
        $show->field('movie_language_id', __('Movie language id'));
        $show->field('movie_nation_id', __('Movie nation id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Movie());

        $form->text('name', __('Name'));
        $form->textarea('description', __('Description'));
        $form->image('image', __('Image'));
        $form->date('release_date', __('Release date'))->default(date('Y-m-d'));
        $form->number('length', __('Length'));
        $form->number('movie_category_id', __('Movie category id'));
        $form->number('movie_language_id', __('Movie language id'));
        $form->number('movie_nation_id', __('Movie nation id'));

        return $form;
    }
}
