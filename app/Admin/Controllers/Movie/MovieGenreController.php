<?php

namespace App\Admin\Controllers\Movie;

use App\Models\Movie\MovieGenre;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MovieGenreController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'MovieGenre';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MovieGenre());

        $grid->model()->withCount('movies');

        $grid->column('id', __('Id'))->hide();
        $grid->column('name', __('Name'));
        $grid->column('updated_at', __('Updated at'))->hide()->sortable();
        $grid->column('created_at', __('Created at'))->hide()->sortable();
        $grid->column('movies', 'Movies count')->display(function ($movies) {
            return count($movies);
        });

        $grid->filter(function (Grid\Filter $filter) {
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
        $show = new Show(MovieGenre::findOrFail($id));

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
        $form = new Form(new MovieGenre());

        $form->text('name', __('Name'));

        return $form;
    }
}
