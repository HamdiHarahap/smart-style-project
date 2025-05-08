<?php

namespace App\Filament\Resources\HairTypeResource\Pages;

use App\Filament\Resources\HairTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHairType extends CreateRecord
{
    protected static string $resource = HairTypeResource::class;

    protected function afterCreate(): void
    {
        HairTypeResource::addHairTypeToProlog($this->record->nama);
    }
}
