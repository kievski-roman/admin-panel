<?php

namespace App\Filament\Admin\Resources\DriverRequests\Pages;

use App\Filament\Admin\Resources\DriverRequests\DriverRequestResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDriverRequest extends EditRecord
{
    protected static string $resource = DriverRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
