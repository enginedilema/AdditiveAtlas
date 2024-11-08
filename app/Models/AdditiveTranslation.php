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
}
