<?php

namespace App\Filament\Resources\FaceShapeResource\Pages;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\FaceShapeResource;

class ListFaceShapes extends ListRecords
{
    protected static string $resource = FaceShapeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function afterDelete(Model $record): void
    {
        FaceShapeResource::removeShapeFromProlog($record->nama);
    }
}
