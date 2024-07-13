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
        $typeFrontEnd->nome = 'Front-end';
        $typeFrontEnd->descrizione = 'descrizione da definire...';
        $typeFrontEnd->icona = "fa-solid fa-image";
        $typeFrontEnd->save();

        $typeBackEnd = new Type();
        $typeBackEnd->nome = 'Back-end';
        $typeBackEnd->descrizione = 'descrizione da definire...';
        $typeBackEnd->icona = "fa-solid fa-database";
        $typeBackEnd->save();

        $typeFullStack = new Type();
        $typeFullStack->nome = 'Full-Stack';
        $typeFullStack->descrizione = 'descrizione da definire...';
        $typeFullStack->icona = "fa-solid fa-book-skull";
        $typeFullStack->save();

        $typeDesign = new Type();
        $typeDesign->nome = 'Design';
        $typeDesign->descrizione = 'descrizione da definire...';
        $typeDesign->icona = "fa-solid fa-ruler-combined";
        $typeDesign->save();
    }
}
