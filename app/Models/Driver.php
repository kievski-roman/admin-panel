<?php

namespace App\Models;

use App\Jobs\SendFarewellDriverEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Driver extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'first_name', 'last_name', 'birthday',
        'email', 'salary', 'images', 'user_id',
    ];

    protected $casts = [
        'birthday' => 'date',
        'images' => 'array',
    ];

    protected $appends = [
        'full_name',
    ];

    protected function firstName(): Attribute
    {
        return Attribute::make(
            set: fn($v) => mb_strtolower(trim($v)),
            get: fn($v) => mb_convert_case($v, MB_CASE_TITLE, 'UTF-8')
        );
    }
    protected function lastName(): Attribute
    {
        return Attribute::make(
            set: fn($v) => trim($v),
            get: fn($v) => mb_convert_case($v, MB_CASE_TITLE, 'UTF-8')
        );
    }


    public function concatFullName(): string
    {
        return ucwords(
            str($this->attributes['first_name'])
                ->append(' ')
                ->append(ucfirst($this->attributes['last_name']))
        );

    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->concatFullName(),
        );
    }

    public function buses(): HasMany
    {
        return $this->hasMany(Bus::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFormer($query)
    {
        return $query->onlyTrashed();
    }

    protected static function booted(): void
    {
        static::deleted(function (Driver $driver) {
            Bus::where('driver_id', $driver->id)->update(['driver_id' => null]);

            dispatch(new SendFarewellDriverEmail($driver->id))
                ->delay(now()->addDay());
        });
    }
}
