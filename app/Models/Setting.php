<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'organization_name',
        'organization_slogan',
        'organization_logo',
        'organization_logo',
        'voting_title',
        'voting_description',
        'voting_logo',
        'voting_active',
        'allow_user_registration',
        'auto_attend',
        'theme'
    ];
}
