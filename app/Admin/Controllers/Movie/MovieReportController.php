<?php

namespace App\Admin\Controllers\Movie;

use App\Models\Movie\MovieReport;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MovieReportController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'MovieReport';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MovieReport());

        $grid->column('id', __('Id'));
        $grid->column('from', __('From'))->searchable();
        $grid->column('episode', __('Episode'))->searchable();
        $grid->column('reason', __('Reason'))->hide();
        $grid->column('movie.name', __('Movie'))->searchable();
        $grid->column('movie.id', __('Movie Id'))->searchable()->hide();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'))->hide();

        $grid->disableFilter();
        $grid->disableCreateButton();

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
        $show = new Show(MovieReport::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('from', __('From'));
        $show->field('episode', __('Episode'));
        $show->field('movie.id', __('Movie Id'));
        $show->field('movie.name', __('Movie'));
        $show->field('reason', __('Reason'));
        $show->field('movie_id', __('Movie id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new MovieReport());
        if ($form->isEditing()) {
            $form->text('reason', __('Reason'));
        }
        return $form;
    }
}
