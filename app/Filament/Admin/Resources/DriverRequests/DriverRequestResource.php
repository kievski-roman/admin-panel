<?php

namespace App\Filament\Admin\Resources\DriverRequests;

use App\Filament\Admin\Resources\DriverRequests\Pages\CreateDriverRequest;
use App\Filament\Admin\Resources\DriverRequests\Pages\EditDriverRequest;
use App\Filament\Admin\Resources\DriverRequests\Pages\ListDriverRequests;
use App\Filament\Admin\Resources\DriverRequests\Schemas\DriverRequestForm;
use App\Filament\Admin\Resources\DriverRequests\Tables\DriverRequestsTable;
use App\Models\DriverRequest;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DriverRequestResource extends Resource
{
    protected static ?string $model = DriverRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'last_name';

    public static function form(Schema $schema): Schema
    {
        return DriverRequestForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DriverRequestsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDriverRequests::route('/'),
            'create' => CreateDriverRequest::route('/create'),
            'edit' => EditDriverRequest::route('/{record}/edit'),
        ];
    }
}
