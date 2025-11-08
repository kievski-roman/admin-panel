<?php

namespace App\Filament\Admin\Resources\DriverRequests\Pages;

use App\Filament\Admin\Resources\DriverRequests\DriverRequestResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDriverRequests extends ListRecords
{
    protected static string $resource = DriverRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
