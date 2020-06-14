<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieMovieGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_movie_genres', function (Blueprint $table) {
            $table->integer("movie_id")->unsigned()->index();
            $table->foreign("movie_id")->references("id")->on("movies");

            $table->integer("movie_genre_id")->unsigned()->index();
            $table->foreign("movie_genre_id")->references("id")->on("movie_genres");

            $table->primary(["movie_id", "movie_genre_id"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_movie_genres');
    }
}
