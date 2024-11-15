<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdditiveTranslation;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Http;

class TranslateAdditiveController extends Controller
{
    public function translateDeepL()
    {
        $authKey = env('DEEPL_KEY'); // Clave de autenticación de DeepL
        $url = env('DEEPL_URL'); // URL de la API de DeepL
    
        // Obtén registros donde alguno de los campos esté vacío y que no sea inglés
        $additivesToTranslate = AdditiveTranslation::where('lang', '!=', 'en')
            ->where('lang', '!=', 'ca')
            ->where(function ($query) {
                $query->whereNull('additive_name')
                    ->orWhereNull('description')
                    ->orWhereNull('option_process')
                    ->orWhereNull('food_uses')
                    ->orWhereNull('industrial_uses')
                    ->orWhereNull('beneficial_properties')
                    ->orWhereNull('side_effects');
            })
            ->inRandomOrder() 
            ->take(10) // Limitar el número de traducciones por ejecución
            ->get();
    
        foreach ($additivesToTranslate as $additiveTranslation) {
            // Obtén el registro fuente en inglés relacionado
            $sourceAdditive = AdditiveTranslation::where('additive_id', $additiveTranslation->additive_id)
                ->where('lang', 'en')
                ->first();
    
  
            $targetLang = strtoupper($additiveTranslation->lang); // Idioma destino (ISO 639-1)
            $fieldsToTranslate = [
                'additive_name' => $sourceAdditive->additive_name,
                'description' => $sourceAdditive->description,
                'option_process' => $sourceAdditive->option_process,
                'food_uses' => $sourceAdditive->food_uses,
                'industrial_uses' => $sourceAdditive->industrial_uses,
                'beneficial_properties' => $sourceAdditive->beneficial_properties,
                'side_effects' => $sourceAdditive->side_effects,
            ];
    
            foreach ($fieldsToTranslate as $field => $text) {
                // Solo traducir si el texto destino está vacío y el origen no lo está
                if (is_null($additiveTranslation->$field) && !is_null($text)) {
                    // Realiza la solicitud a DeepL
                    $response = Http::withHeaders([
                        'Authorization' => 'DeepL-Auth-Key ' . $authKey,
                        'Content-Type' => 'application/json',
                    ])->post($url, [
                        'text' => [$text], // Texto a traducir
                        'target_lang' => $targetLang,
                        'source_lang' => 'EN', // Idioma fuente
                    ]);
    
                    if ($response->successful()) {
                        // Extrae el texto traducido y actualiza el campo
                        $translatedText = $response->json()['translations'][0]['text'];
                        $additiveTranslation->update([
                            $field => $translatedText,
                        ]);
                    } else {
                        // Registra el error
                        dd($response->json());
                    }
                }
            }
        }
    
        return response()->json(['message' => 'Proceso de traducción completado.']);
    }


    public function translate(){
        $additiveTranslation = AdditiveTranslation::where('lang', '!=', 'en')
        ->whereNull('description')
        ->whereHas('origin', function ($query) {
            $query->where('lang', 'en')->whereNotNull('description');
        })
        ->first();

        $additiveTranslationOrigin = AdditiveTranslation::where('additive_id', $additiveTranslation->additive_id)->where('lang','en')->first();
        $tr = new GoogleTranslate();
        $additiveTranslation->additive_name = ucfirst($tr->setSource('en')->setTarget($additiveTranslation->lang)->translate($additiveTranslationOrigin->additive_name));
        $additiveTranslation->description = $tr->setSource('en')->setTarget($additiveTranslation->lang)->translate($additiveTranslationOrigin->description);
        $additiveTranslation->option_process = $tr->setSource('en')->setTarget($additiveTranslation->lang)->translate($additiveTranslationOrigin->option_process);
        $additiveTranslation->food_uses = $tr->setSource('en')->setTarget($additiveTranslation->lang)->translate($additiveTranslationOrigin->food_uses);
        $additiveTranslation->industrial_uses = $tr->setSource('en')->setTarget($additiveTranslation->lang)->translate($additiveTranslationOrigin->industrial_uses);
        $additiveTranslation->beneficial_properties = $tr->setSource('en')->setTarget($additiveTranslation->lang)->translate($additiveTranslationOrigin->beneficial_properties);
        $additiveTranslation->side_effects = $tr->setSource('en')->setTarget($additiveTranslation->lang)->translate($additiveTranslationOrigin->side_effects);
        $additiveTranslation->save();
    }
}
