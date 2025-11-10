<?php

namespace App\Filament\Admin\Resources\Buses\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BusForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('plate')
                    ->required()
                    ->unique(),
                Select::make('brand_id')
                    ->label('Bus')
                    ->relationship('brand', 'name')
                    ->required(),
                Select::make('driver_id')
                    ->relationship('driver', 'first_name')
                    ->required(),
            ]);
    }
}
