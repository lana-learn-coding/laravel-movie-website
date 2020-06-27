<?php

use App\Admin\Controllers\CastController;
use App\Admin\Controllers\Movie\MovieCategoryController;
use App\Admin\Controllers\Movie\MovieController;
use App\Admin\Controllers\Movie\MovieGenreController;
use App\Admin\Controllers\Movie\MovieLanguageController;
use App\Admin\Controllers\Movie\MovieNationController;
use App\Admin\Controllers\Movie\MovieTagController;
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
    $router->resource('movies/episodes', 'Movie\MovieEpisodeController');
    $router->resource('movies/genres', 'Movie\MovieGenreController');
    $router->resource('movies', 'Movie\MovieController');

    $router->resource('casts', 'Movie\CastController');
});
