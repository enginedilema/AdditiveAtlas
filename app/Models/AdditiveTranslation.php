<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditiveTranslation extends Model
{
    //
    protected $fillable = [
        'additive_id',
        'lang',
        'additive_name',
        'description',
        'option_process',
        'food_uses',
        'industrial_uses',
        'beneficial_properties',
        'side_effects',
    ];
    public function additive()
    {
        return $this->belongsTo(Additive::class);
    }
    public function origin()
    {
        return $this->belongsTo(self::class, 'additive_id', 'additive_id')
            ->where('lang', 'en');
    }
}
