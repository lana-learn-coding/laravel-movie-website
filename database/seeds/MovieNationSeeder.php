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
        $nations = [
            ['name' => 'Vietnam'],
            ['name' => 'America'],
            ['name' => 'China'],
            ['name' => 'Japan'],
            ['name' => 'India'],
            ['name' => 'Others'],
        ];

        MovieNation::insert($nations);
    }
}
