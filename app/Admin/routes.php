<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
    'as' => config('admin.route.prefix') . '.',
], function (Router $router) {
    $router->get('/', 'HomeController@index');

    $router->resource('movies/languages', 'Movie\MovieLanguageController');
    $router->resource('movies/nations', 'Movie\MovieNationController');
    $router->resource('movies/categories', 'Movie\MovieCategoryController');
    $router->resource('movies/genres', 'Movie\MovieGenreController');
    $router->resource('movies', 'Movie\MovieController');

    $router->resource('casts', 'CastController');
});
