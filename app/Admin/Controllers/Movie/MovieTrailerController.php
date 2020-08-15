<?php

namespace App\Admin\Controllers\Movie;

use App\Models\Movie\Movie;
use App\Models\Movie\MovieTrailer;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MovieTrailerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'MovieTrailer';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new MovieTrailer());

        $grid->column('id', __('Id'))->hide()->sortable();
        $grid->column('movie.name', __('Movie'))->sortable()->searchable();
        $grid->column('number', __('Number'))->sortable();
        $grid->column('file', __('File'));
        $grid->column('quality', __('Quality'))->sortable()->searchable();
        $grid->column('movie_id', __('Movie Id'))->sortable()->hide()->searchable();
        $grid->column('updated_at', __('Updated at'))->sortable();
        $grid->column('created_at', __('Created at'))->hide()->sortable();

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->like('movie.name', __('Movie'));
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
        $detail = MovieTrailer::findOrFail($id);
        $show = new Show($detail);

        $show->field('id', __('Id'));
        $show->field('movie.name', __('Movie'));
        $show->field('number', __('Number'));
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
        $form = new Form(new MovieTrailer());

        $form->select('movie_id', __('Movie'))->options(Movie::all()->pluck('name', 'id'))->required();
        $form->number('number', __('Number'))->required()->rules('integer|min:1');
        $form->select('quality', __('Quality'))->options([
            '360' => '360p',
            '480' => '480p',
            '720' => '720p',
            '1080' => '1080p',
            '2160' => '2k',
            '4096' => '4k',
        ])->required();

        if ($form->isEditing()) {
            $form->file('file', __('File'))->readonly();
        } else {
            $form->largefile('file', __('File'))->required();

            $form->ignore(['uploaded']);

            $form->saving(function (Form $form) {
                if ($form->file && $form->model()->file != $form->file) {
                    $form->file = moveAetherUploadedVideoToPublicStorageAndGetUrl($form->file);
                }
            });
        }

        return $form;
    }
}
