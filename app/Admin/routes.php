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

    $router->resource('movies/languages', MovieLanguageController::class);
    $router->resource('movies/nations', MovieNationController::class);

    $router->resource('movies/tags', MovieTagController::class);
    $router->resource('movies/categories', MovieCategoryController::class);
    $router->resource('movies/genres', MovieGenreController::class);
    $router->resource('movies', MovieController::class);

    $router->resource('casts', CastController::class);
});
