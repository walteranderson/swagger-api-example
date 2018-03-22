<?php

use Illuminate\Database\Seeder;
use App\Cat;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cat::truncate();
        factory(Cat::class, 20)->create();
    }
}
