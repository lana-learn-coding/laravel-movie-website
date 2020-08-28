<?php

namespace App\Admin\Controllers\User;

use App\Models\User\UserComment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserCommentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'UserComment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserComment());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('comment', __('Comment'));
        $grid->column('user.username', __('Username'))->searchable();
        $grid->column('user.email', __('Email'))->searchable()->hide();
        $grid->column('movie.name', __('Movie'))->searchable();
        $grid->column('movie.id', __('Movie Id'))->searchable()->hide();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'))->hide();

        $grid->filter(function ($filter) {
            $filter->like('user.username', __('Username'));
            $filter->like('email', __('Email'));
            $filter->between('email_verified_at', __('Email verified at'))->date();
            $filter->between('updated_at', __('Updated At'))->date();
        });

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
        $show = new Show(UserComment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('comment', __('Comment'));
        $show->field('user.username', __('Username'));
        $show->field('user.email', __('Email'));
        $show->field('movie.name', __('Movie'));
        $show->field('movie.id', __('Movie Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->panel()
            ->tools(function ($tools) {
                $tools->disableEdit();
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
        $form = new Form(new UserComment());
        return $form;
    }
}
