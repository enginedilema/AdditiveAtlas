<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditiveDetail extends Model
{
    protected $casts = [
        'group_members' => 'array',
        'member_of_groups' => 'array',
    ];
    public function translations()
    {
        return $this->hasMany(AdditiveDetailTranslation::class);
    }

    public function translation($lang = 'en')
    {
        return $this->translations()->where('lang', $lang)->first()
            ?? $this->translations()->where('lang', 'en')->first();
    }
}
