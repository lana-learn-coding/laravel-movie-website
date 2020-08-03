<?php

namespace App\Admin\Controllers\User;

use App\Models\User\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Hash;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'User';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('username', __('Username'))->sortable()->searchable();
        $grid->column('avatar', __('Avatar'))->image();
        $grid->column('email', __('Email'))->sortable()->searchable();

        $grid->column('detail.name', __('Name'))->sortable();
        $grid->column('detail.birth_date', __('Birth Date'))->sortable()->date('Y-m-d');
        $grid->column('detail.gender', __('Gender'))->sortable();

        $grid->column('email_verified_at', __('Email verified at'))->hide()->sortable();
        $grid->column('remember_token', __('Remember token'))->hide();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'))->hide();

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->like('username', __('Username'));
            $filter->like('email', __('Email'));
            $filter->like('detail.name', __('Name'));
            $filter->between('email_verified_at', __('Email verified at'))->date();
            $filter->between('updated_at', __('Updated At'))->date();
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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('username', __('Username'));
        $show->field('avatar', __('Avatar'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('remember_token', __('Remember token'));

        $show->field('detail.name', __('Name'));
        $show->field('detail.birth_date', __('Birth Date'));
        $show->field('detail.gender', __('Gender'));

        $show->field('created_at', __('Created at'));
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
        $form = new Form(new User());
        if ($form->isCreating()) {
            $form->text('username', __('Username'))->required()->rules('string|min:6|max:255|unique:users');
            $form->cropper('avatar', __('Avatar'))->cRatio(250, 250)->crop(250, 250);
            $form->email('email', __('Email'))->required()->rules('email|unique:users');
            $form->password('password', __('Password'))->required()->rules('confirmed|min:8')->default(function ($form) {
                return $form->model()->password;
            });
            $form->password('password_confirmation', trans('Password Confirmation'))->required()->default(function ($form) {
                return $form->model()->password;
            });

            $form->text('detail.name', __('Name'))->rules('string|min:3|max:255');
            $form->date('detail.birth_date', __('Birth Date'))->rules('before:today');
            $form->select('detail.gender', __('Gender'))->options([
                'M' => 'Male',
                'F' => 'Female',
            ]);

            $form->ignore(['password_confirmation']);
            $form->saving(function (Form $form) {
                if ($form->password && $form->model()->password != $form->password) {
                    $form->password = Hash::make($form->password);
                }
            });
        } elseif ($form->isEditing()) {
            $form->date('created_at')->required();
            $form->date('updated_at')->required();
        }
        return $form;
    }
}
