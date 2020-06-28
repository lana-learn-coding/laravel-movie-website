<?php

namespace App\Admin\Controllers\Movie;

use App\Models\Movie\Movie;
use App\Models\Movie\MovieEpisode;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MovieEpisodeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'MovieEpisode';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MovieEpisode());

        $grid->column('id', __('Id'))->hide()->sortable();
        $grid->column('movie.name', __('Movie'))->sortable();
        $grid->column('number', __('Number'));
        $grid->column('name', __('Name'));
        $grid->column('file', __('File'));
        $grid->column('quality', __('Quality'))->sortable();
        $grid->column('movie_id', __('Movie Id'))->sortable()->hide()->searchable();
        $grid->column('updated_at', __('Updated at'))->sortable();
        $grid->column('created_at', __('Created at'))->hide()->sortable();

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->like('movie.name', __('Movie'));
            $filter->like('name', __('Ep name'));
            $filter->equal('number', __('Ep number'));
            $filter->between('updated_at', __('Updated At'));
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
        $detail = MovieEpisode::findOrFail($id);
        $show = new Show($detail);

        $show->field('id', __('Id'));
        $show->field('movie.name', __('Movie'));
        $show->field('number', __('Number'));
        $show->field('name', __('Name'));
        $show->field('file', __('File'));
        $show->field('quality', __('Quality'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new MovieEpisode());

        $form->select('movie_id', __('Movie'))->options(Movie::all()->pluck('name', 'id'))->required();
        $form->number('number', __('Number'))->required()->rules('integer|min:1');
        $form->text('name', __('Name'))->required();
        $form->select('quality', __('Quality'))->options([
            '720' => '720p',
            '1080' => '1080p',
        ])->required();
        $form->file('file', __('File'))->required()->rules('mimes:mp4');

        return $form;
    }
}
