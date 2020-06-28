<?php

namespace App\Admin\Controllers\Movie;

use App\Models\Movie\MovieTag;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MovieTagController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'MovieTag';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MovieTag());

        $grid->column('id', __('Id'))->hide();
        $grid->column('name', __('Name'));
        $grid->column('updated_at', __('Updated at'))->hide()->sortable();
        $grid->column('created_at', __('Created at'))->hide()->sortable();
        $grid->column('movies', 'Movies count')->display(function ($movies) {
            return count($movies);
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
        $show = new Show(MovieTag::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('updated_at', __('Updated at'));
        $show->field('name', __('Name'));
        $show->field('movies', 'Movies count')->as(function ($movies) {
            return count($movies);
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
        $form = new Form(new MovieTag());

        $form->text('name', __('Name'));

        return $form;
    }
}
