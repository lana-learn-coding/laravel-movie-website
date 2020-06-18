<?php

use App\Models\Cast;
use Illuminate\Database\Seeder;

class CastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cast::class, 300)->create();
    }
}
