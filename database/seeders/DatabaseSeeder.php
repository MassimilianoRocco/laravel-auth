<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            UserSeeder::class,
            // inserisco type prima di project, dato che project necessita di type per essere conclusa
            TypeSeeder::class,
            TechnologySeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
