<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieTrailersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_trailers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->smallInteger('number')->unsigned();

            $table->string('file');
            $table->integer('quality');

            $table->integer('movie_id')->unsigned()->index();
            $table->foreign('movie_id')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_trailers');
    }
}
