<?php

use App\Models\Movie\MovieGenre;
use Illuminate\Database\Seeder;

class MovieGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MovieGenre::class, 30)->create();
    }
}
