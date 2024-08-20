<?php

namespace App\Filament\Resources\LaporPajakResource\Pages;

use App\Filament\Resources\LaporPajakResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLaporPajak extends CreateRecord
{
    protected static string $resource = LaporPajakResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['userinput'] = auth()->id();

        return $data;
    }
}
