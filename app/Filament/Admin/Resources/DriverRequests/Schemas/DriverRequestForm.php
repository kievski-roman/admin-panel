<?php

namespace App\Filament\Admin\Resources\DriverRequests\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DriverRequestForm
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
            ]);
    }
}
