<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bus extends Model
{
    protected $fillable = ['plate', 'brand_id', 'driver_id'];

    protected function plate(): Attribute
    {
        return Attribute::make(
            set: fn ($v) => mb_strtoupper(preg_replace('/\s+/', '', (string) $v))
        );
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }
}
