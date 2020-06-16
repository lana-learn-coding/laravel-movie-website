<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesCastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_casts', function (Blueprint $table) {
            $table->integer("movie_id")->unsigned()->index();
            $table->foreign("movie_id")->references("id")->on("movies");

            $table->integer("cast_id")->unsigned()->index();
            $table->foreign("cast_id")->references("id")->on("casts");

            $table->primary(["movie_id", "cast_id"]);
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
        Schema::dropIfExists('movies_casts');
    }
}
