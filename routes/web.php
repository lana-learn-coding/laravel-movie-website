<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['namespace' => 'Home'], function () {

    Route::get('/', 'HomeController@root')->name('root');
    Route::get('/home', 'HomeController@home')->name('home');

    Route::get('/hot', 'HotMovieController@index')->name('hot');
    Route::get('/hot/day', 'HotMovieController@hotByDay')->name('hot.day');
    Route::get('/hot/week', 'HotMovieController@hotByWeek')->name('hot.week');
    Route::get('/hot/month', 'HotMovieController@hotByMonth')->name('hot.month');

    Route::get('/new', 'NewMovieController@index')->name('new');
    Route::get('/new/released', 'NewMovieController@newByReleaseDate')->name('new.released');
    Route::get('/new/updated', 'NewMovieController@newByUpdateDate')->name('new.updated');
    Route::get('/new/created', 'NewMovieController@newByCreateDate')->name('new.created');

    Route::get('/search', 'SearchMovieController@simpleSearch')->name('search');
    Route::get('/search/type', 'SearchMovieController@typeSearch')->name('type');
    Route::get('/search/advanced', 'SearchMovieController@advancedSearch')->name('search.advanced');
});

Route::group(['namespace' => 'Movie'], function () {
    Route::get('/movies/{id}', 'MovieController@movie')->name('movie');
    Route::get('/movies/{id}/watch', 'MovieController@watchMovieIndex')->name('movie.watch');
    Route::get('/movies/{id}/watch/{ep}', 'MovieController@watchMovie')->name('movie.watch.ep');
    Route::get('/movies/{id}/favorite/add', 'MovieController@favoriteMovie')->name('movie.favorite.add');
    Route::get('/movies/{id}/favorite/remove', 'MovieController@removeFavoriteMovie')->name('movie.favorite.remove');
    Route::get('/movies/{id}/rating/rate', 'MovieController@rateMovie')->name('movie.rating.rate');
    Route::get('/movies/{id}/episodes/{ep}/report', 'MovieController@reportMovie')->name('movie.report');

    Route::post('/movies/{id}/comment/write', 'MovieController@writeComment')->name('movie.comment.write');

    Route::get('/casts', 'CastController@casts')->name('cast');
    Route::get('/casts/{id}', 'CastController@castDetail')->name('cast.detail');

    Route::get('/streams/{path}', 'ContentController@stream')->where('path', '(.*)')->name('stream.video');
});

Route::group(['namespace' => 'User'], function () {
    Route::get('/users/{id}', 'UserController@userDetail')->name('user.detail');
    Route::get('/users/{id}/favorite-movies', 'UserController@favorites')->name('user.favorite');
    Route::get('/users/{id}/rated-movies', 'UserController@ratedMovies')->name('user.rated');

    Route::get('/users/{id}/update', 'UserController@getUpdate')->name('user.update');
    Route::post('/users/{id}/update', 'UserController@update')->name('user.update');
});

