<?php

namespace App\Filament\Resources\FaceShapeResource\Pages;

use App\Filament\Resources\FaceShapeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFaceShape extends CreateRecord
{
    protected static string $resource = FaceShapeResource::class;

    protected function afterCreate(): void
    {
        FaceShapeResource::addShapeToProlog($this->record->nama);
    }
}
