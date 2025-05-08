<?php

namespace App\Filament\Resources\HairTypeResource\Pages;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\HairTypeResource;

class ListHairTypes extends ListRecords
{
    protected static string $resource = HairTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function afterDelete(Model $record): void
    {
        HairTypeResource::removeHairTypeFromProlog($record->nama);
    }
}
