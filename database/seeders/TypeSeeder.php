<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeFrontEnd = new Type();
        $typeFrontEnd->name = 'Front-end';
        $typeFrontEnd->descrizione = 'descrizione da definire...';
        $typeFrontEnd->icona = "fa-solid fa-image";

        $typeBackEnd = new Type();
        $typeBackEnd->name = 'Back-end';
        $typeBackEnd->descrizione = 'descrizione da definire...';
        $typeBackEnd->icona = "fa-solid fa-database";

        $typeFullStack = new Type();
        $typeFullStack->name = 'Full-Stack';
        $typeFullStack->descrizione = 'descrizione da definire...';
        $typeFullStack->icona = "fa-solid fa-book-skull";

        $typeDesign = new Type();
        $typeDesign->name = 'Design';
        $typeDesign->descrizione = 'descrizione da definire...';
        $typeDesign->icona = "fa-solid fa-ruler-combined";
    }
}
