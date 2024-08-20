<?php

namespace App\Filament\Resources\ObjekPajakResource\Pages;

use App\Filament\Resources\ObjekPajakResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListObjekPajaks extends ListRecords
{
    protected static string $resource = ObjekPajakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
