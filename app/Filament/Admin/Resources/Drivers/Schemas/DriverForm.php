<?php

namespace App\Filament\Admin\Resources\Drivers\Schemas;

use Filament\Forms\Components\DatePicker;
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
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                DatePicker::make('birthday')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('salary')
                    ->required()
                    ->numeric(),
                TextInput::make('images'),
                Select::make('user_id')
                    ->relationship('user', 'name'),
            ]);
    }
}
