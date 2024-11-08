<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Additive extends Model
{
 protected $fillables = [
  'additive_e_code',
  'additive_name',
  'additive_description',
  'additive_function',
  'additive_origin',
  'additive_danger',
  'additive_note',
  'additive_eu_approval',
  'additive_eu_approval_code',
  'additive_eu_approval_date',
  'additive_eu_approval_expiration_date',
  'additive_eu_approval_note',
  'additive_eu_approval_link'];

  public function details()
  {
      return $this->hasMany(AdditiveDetail::class, 'additive_e_code', 'additive_e_code');
  }

  public function translations()
    {
        return $this->hasMany(AdditiveTranslation::class);
    }

    public function translation($lang = 'en')
    {
        return $this->translations()->where('lang', $lang)->first()
            ?? $this->translations()->where('lang', 'en')->first();
    }
}
