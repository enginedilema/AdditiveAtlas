<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdditiveTranslation;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateAdditiveController extends Controller
{
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
