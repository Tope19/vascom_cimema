<?php

use Illuminate\Database\Seeder;
use App\Models\Cinema;


class CinemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cinema::class, 10)->create();

    }
}
