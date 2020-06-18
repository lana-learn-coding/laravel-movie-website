<?php

use App\Models\Movie\MovieNation;
use Illuminate\Database\Seeder;

class MovieNationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MovieNation::class, 8)->create();
    }
}
