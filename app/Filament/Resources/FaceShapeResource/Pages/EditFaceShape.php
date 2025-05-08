<?php

namespace App\Filament\Resources\FaceShapeResource\Pages;

use App\Filament\Resources\FaceShapeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFaceShape extends EditRecord
{
    protected static string $resource = FaceShapeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterDelete(): void
    {
        FaceShapeResource::removeShapeFromProlog($this->record->nama);
    }
}
