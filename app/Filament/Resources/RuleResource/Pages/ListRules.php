<?php

namespace App\Filament\Resources\RuleResource\Pages;

use Filament\Actions;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\RuleResource;
use Filament\Resources\Pages\ListRecords;

class ListRules extends ListRecords
{
    protected static string $resource = RuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function afterDelete(Model $record): void
    {
        RuleResource::removeRuleFromProlog(
            $record->hairType->nama,
            $record->faceShape->nama,
            $record->activity->nama,
            $record->hairStyle->nama
        );
    }

}
