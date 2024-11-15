<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdditiveDetail;
use App\Models\AdditiveDetailTranslation;

class AdditiveDetailTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definimos los idiomas que queremos añadir
        $languages = config('languages.available');

        // Obtenemos todos los registros de la tabla AdditiveDetail
        $additiveDetails = AdditiveDetail::all();

        foreach ($additiveDetails as $additiveDetail) {
            foreach ($languages as $lang) {
                // Creamos un registro de AdditiveDetailTranslation para cada AdditiveDetail existente y cada idioma
                AdditiveDetailTranslation::create([
                    'additive_detail_id' => $additiveDetail->id,
                    'lang' => $lang,
                    'additive_e_code' => $lang === 'en' ? $additiveDetail->additive_e_code : null,
                    'display_order' => $additiveDetail->display_order,
                    'food_category_level' => $additiveDetail->food_category_level,
                    'food_category' => $lang === 'en' ? $additiveDetail->food_category : null,
                    'food_category_desc' => $lang === 'en' ? $additiveDetail->food_category_desc : null,
                ]);
            }
        }
    }
}
