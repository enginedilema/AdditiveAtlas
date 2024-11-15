<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Additive;
use App\Models\AdditiveTranslation;

class AdditiveTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   // Definimos los idiomas que queremos añadir
   $languages = config('languages.available');
   // Obtenemos todos los registros de la tabla Additive
   $additives = Additive::all();

   foreach ($additives as $additive) {
       foreach ($languages as $lang) {
           // Creamos un registro de AdditiveTranslation para cada Additive existente y cada idioma
           AdditiveTranslation::create([
               'additive_id' => $additive->id,
               'additive_name' => $lang === 'en' ? $additive->additive_name : null,
               'lang' => $lang,
           ]);
       }
   }
    }
}
