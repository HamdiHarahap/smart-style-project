<?php

namespace App\Filament\Resources\HairTypeResource\Pages;

use App\Filament\Resources\HairTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHairType extends EditRecord
{
    protected static string $resource = HairTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterDelete(): void
    {
        HairTypeResource::removeHairTypeFromProlog($this->record->nama);
    }
}
