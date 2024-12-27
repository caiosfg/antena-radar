<?php

namespace Database\Seeders;

use App\Models\Satellite;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Satellite::factory(10)->create();
    }
}
