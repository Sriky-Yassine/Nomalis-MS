<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(\App\Models\Film::class, 150)->create();
        Film::factory()->count(50)->create();
    }
}
