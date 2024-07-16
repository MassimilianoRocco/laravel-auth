<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $newTech = new Technology();
        $newTech->name = 'PHP';
        $newTech->description = $faker->sentence(22);
        $newTech->icon = "fa-brands fa-php";
        $newTech->save();

        $newTech = new Technology();
        $newTech->name = 'Laravel';
        $newTech->description = $faker->sentence(22);
        $newTech->icon = "fa-brands fa-laravel";
        $newTech->save();

        $newTech = new Technology();
        $newTech->name = 'VueJS';
        $newTech->description = $faker->sentence(22);
        $newTech->icon = "fa-brands fa-vuejs";
        $newTech->save();

        $newTech = new Technology();
        $newTech->name = 'Javascript';
        $newTech->description = $faker->sentence(22);
        $newTech->icon = "fa-brands fa-js";
        $newTech->save();

        $newTech = new Technology();
        $newTech->name = 'HTML';
        $newTech->description = $faker->sentence(22);
        $newTech->icon = "fa-brands fa-html5";
        $newTech->save();

        $newTech = new Technology();
        $newTech->name = 'CSS3';
        $newTech->description = $faker->sentence(22);
        $newTech->icon = "fa-brands fa-css3";
        $newTech->save();

    }
}
