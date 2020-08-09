<?php

use Illuminate\Database\Seeder;

class ProdDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MovieCategorySeeder::class,
            MovieGenreSeeder::class,
            MovieLanguageSeeder::class,
            MovieNationSeeder::class,
            AdminMenuSeeder::class
        ]);
    }
}
