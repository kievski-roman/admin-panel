<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $fillable = [
        'company_name',
        'logo_path',
        'admin_phone',
        'short_description',
    ];
}
