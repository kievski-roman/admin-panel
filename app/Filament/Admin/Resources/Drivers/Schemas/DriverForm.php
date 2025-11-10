<?php

namespace App\Filament\Admin\Resources\Drivers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DriverForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('first_name')
                    ->required()
                    ->string(),
                TextInput::make('last_name')
                    ->required()
                    ->string(),
                DatePicker::make('birthday')
                    ->required()
                    ->format('Y-m-d')
                    ->rule(function () {
                        return fn(string $attr, $value, $fail) => \Illuminate\Support\Arr::wrap($value) && \Carbon\Carbon::parse($value)->age > 65
                            ? $fail('Drivers must be no older than 65 years of age.')
                            : null;
                    })
                    ->minDate(now()->subYears(65))
                    ->maxDate(now()),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->unique()
                    ->required(),
                TextInput::make('salary')
                    ->required()
                    ->minValue(1)
                    ->numeric(),
                Repeater::make('images')
                    ->schema([
                        TextInput::make('text'),
                        TextInput::make('src')->url(),
                    ])
                    ->default([])
                    ->collapsed()
                    ->grid(2),
                Select::make('user_id')
                    ->relationship('user', 'name'),
            ]);
    }
}
