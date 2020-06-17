<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MovieSeeder::class,
            MovieCategorySeeder::class,
            MovieGenreSeeder::class,
            MovieLanguageSeeder::class,
            MovieViewSeeder::class,
            MovieNationSeeder::class,
            CastSeeder::class,
        ]);
    }
}
