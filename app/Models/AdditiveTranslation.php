<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditiveTranslation extends Model
{
    //
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
