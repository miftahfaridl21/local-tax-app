<?php

namespace App\Filament\Resources\JenisPajakResource\Pages;

use App\Filament\Resources\JenisPajakResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisPajak extends EditRecord
{
    protected static string $resource = JenisPajakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
