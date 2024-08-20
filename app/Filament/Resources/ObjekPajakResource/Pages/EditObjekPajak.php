<?php

namespace App\Filament\Resources\ObjekPajakResource\Pages;

use App\Filament\Resources\ObjekPajakResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditObjekPajak extends EditRecord
{
    protected static string $resource = ObjekPajakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
