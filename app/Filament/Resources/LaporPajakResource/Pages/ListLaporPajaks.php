<?php

namespace App\Filament\Resources\LaporPajakResource\Pages;

use App\Filament\Resources\LaporPajakResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaporPajaks extends ListRecords
{
    protected static string $resource = LaporPajakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Lapor Pajak'),
        ];
    }
}
