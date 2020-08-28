<?php

use Encore\Admin\Facades\Admin;
use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as' => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->get('/', '\App\Admin\Controllers\HomeController@index');

    $router->resource('movies/languages', 'Movie\MovieLanguageController');
    $router->resource('movies/nations', 'Movie\MovieNationController');
    $router->resource('movies/tags', 'Movie\MovieTagController');
    $router->resource('movies/categories', 'Movie\MovieCategoryController');
    $router->resource('movies/genres', 'Movie\MovieGenreController');
    $router->resource('movies/episodes', 'Movie\MovieEpisodeController');
    $router->resource('movies/trailers', 'Movie\MovieTrailerController');
    $router->resource('movies/reports', 'Movie\MovieReportController');
    $router->resource('movies/manage', 'Movie\MovieController');

    $router->resource('casts', 'CastController');

    $router->resource('users/manage', 'User\UserController');
    $router->resource('users/comments', 'User\UserCommentController');
    $router->resource('users/ratings', 'User\UserMovieRatingController');
});
