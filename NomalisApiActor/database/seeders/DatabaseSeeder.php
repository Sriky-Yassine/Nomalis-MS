<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Actor;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        \App\Models\Actor::factory()->count(50)->create();
    }
}
