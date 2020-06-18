<?php

use App\Models\Cast;
use App\Models\Movie\Movie;
use App\Models\Movie\MovieGenre;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Movie::class, 3000)->create();
        foreach (Movie::all() as $movie) {
            $castRatio = rand(1, 5);
            $genreRatio = rand(1, 3);
            foreach (Cast::all()->random($castRatio) as $cast)
                $movie->casts()->attach($cast->id);
            foreach (MovieGenre::all()->random($genreRatio) as $genre) {
                $movie->genres()->attach($genre->id);
            }
            $movie->save();
        }
    }
}
