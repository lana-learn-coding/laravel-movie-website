<?php

namespace App\Admin\Controllers\Movie;

use App\Models\Movie\Movie;
use App\Models\Movie\MovieCategory;
use App\Models\Movie\MovieLanguage;
use App\Models\Movie\MovieNation;
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

        $grid->column('id', __('Id'))->hide()->sortable();
        $grid->column('name', __('Name'))->sortable();
        $grid->column('description', __('Description'))->hide();
        $grid->column('image', __('Cover'))->image()->hide();
        $grid->column('category.name', __('Category'));
        $grid->column('language.name', __('Language'));
        $grid->column('nation.name', __('Nation'));
        $grid->column('updated_at', __('Updated at'))->hide()->sortable();

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->like('name', __('Name'));
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
        $detail = Movie::findOrFail($id);
        $show = new Show($detail);

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('image', __('Image'))->image();
        $show->field('release_date', __('Release date'));
        $show->field('length', __('Length'));
        $show->field('movie_nation_id', __('Nation'))->as(function ($id) use ($detail) {
            return $detail->nation->name ?? '';
        });
        $show->field('movie_language_id', __('Language'))->as(function ($id) use ($detail) {
            return $detail->language->name ?? '';
        });
        $show->field('movie_category_id', __('Category'))->as(function ($id) use ($detail) {
            return $detail->category->name ?? '';
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
        $form = new Form(new Movie());

        $form->text('name', __('Name'))->required();
        $form->textarea('description', __('Description'));
        $form->image('image', __('Image'));
        $form->date('release_date', __('Release date'))->default(date('Y-m-d'))->required();
        $form->number('length', __('Length'))->required();
        $form->select('movie_category_id', __('Category'))->options(MovieCategory::all()->pluck('name', 'id'));
        $form->select('movie_language_id', __('Language'))->options(MovieLanguage::all()->pluck('name', 'id'));
        $form->select('movie_nation_id', __('Nation'))->options(MovieNation::all()->pluck('name', 'id'));

        return $form;
    }
}
