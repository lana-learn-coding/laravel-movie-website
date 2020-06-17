<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMovieMovieGenrePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_movie_genre', function (Blueprint $table) {
            $table->integer('movie_id')->unsigned()->index();
            $table->foreign('movie_id')->references('id')->on('movie_genres')->onDelete('cascade');
            $table->integer('movie_genre_id')->unsigned()->index();
            $table->foreign('movie_genre_id')->references('id')->on('movies')->onDelete('cascade');
            $table->primary(['movie_id', 'movie_genre_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_movie_genre');
    }
}
