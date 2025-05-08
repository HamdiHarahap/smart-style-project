<?php

namespace App\Filament\Resources\HairStyleResource\Pages;

use App\Filament\Resources\HairStyleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHairStyle extends EditRecord
{
    protected static string $resource = HairStyleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
