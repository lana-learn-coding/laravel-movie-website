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

use App\Http\VideoStream;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['namespace' => 'Home'], function () {

    Route::get('/', 'HomeController@root')->name('root');
    Route::get('/home', 'HomeController@home')->name('home');

    Route::get('/hot', 'HotMovieController@index')->name('hot');
    Route::get('/hot/day', 'HotMovieController@hotByDay')->name('hot.day');
    Route::get('/hot/week', 'HotMovieController@hotByWeek')->name('hot.week');
    Route::get('/hot/month', 'HotMovieController@hotByMonth')->name('hot.month');

    Route::get('/new', 'NewMovieController@index')->name('new');
    Route::get('/new/release', 'NewMovieController@newByReleaseDate')->name('new.release');
    Route::get('/new/update', 'NewMovieController@newByUpdateDate')->name('new.update');

    Route::get('/search', 'SearchMovieController@simpleSearch')->name('search');
    Route::get('/search/type', 'SearchMovieController@typeSearch')->name('type');
    Route::get('/search/advanced', 'SearchMovieController@advancedSearch')->name('search.advanced');
});

Route::get('/movies/{id}', 'MovieController@movie')->name('movie');
Route::get('/movies/{id}/watch', 'MovieController@watchMovieIndex')->name('movie.watch');
Route::get('/movies/{id}/watch/{ep}', 'MovieController@watchMovie')->name('movie.watch.ep');

Route::get('/movies/{id}/favorite', 'MovieController@favoriteMovie')->name('movie.favorite.set');
Route::get('/movies/{id}/un-favorite', 'MovieController@unFavoriteMovie')->name('movie.favorite.remove');

Route::get('/streams/{path}', function ($path) {
    $file = storage_path('app/uploads') . DIRECTORY_SEPARATOR . $path;

    if (!file_exists($file)) {
        abort(404);
    }

    $stream = new VideoStream($file);
    return response()->stream(function () use ($stream) {
        $stream->start();
    });
})->where('path', '(.*)')->name('stream.video');
