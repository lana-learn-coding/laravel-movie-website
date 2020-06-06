<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesMoviesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_movies_categories', function (Blueprint $table) {
            $table->integer("movie_id")->unsigned()->index();
            $table->foreign("movie_id")->references("id")->on("movies");

            $table->integer("movie_categories_id")->unsigned()->index();
            $table->foreign("movie_categories_id")->references("id")->on("movie_categories");

            $table->primary(["movie_id", "movie_categories_id"]);
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
        Schema::dropIfExists('movies_movies_categories');
    }
}
