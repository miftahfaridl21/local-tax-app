<?php

namespace App\Filament\Resources\LaporPajakResource\Pages;

use App\Filament\Resources\LaporPajakResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporPajak extends EditRecord
{
    protected static string $resource = LaporPajakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
