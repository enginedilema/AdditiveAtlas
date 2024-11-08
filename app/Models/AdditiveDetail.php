<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditiveDetail extends Model
{
    protected $casts = [
        'group_members' => 'array',
        'member_of_groups' => 'array',
    ];
}
