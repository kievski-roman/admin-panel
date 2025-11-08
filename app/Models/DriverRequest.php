<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverRequest extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
    ];

    protected $casts = [
        'birthday' => 'date',
    ];
}
