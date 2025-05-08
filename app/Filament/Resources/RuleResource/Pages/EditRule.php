<?php

namespace App\Filament\Resources\RuleResource\Pages;

use App\Filament\Resources\RuleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRule extends EditRecord
{
    protected static string $resource = RuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterDelete(): void
    {
        RuleResource::removeRuleFromProlog(
            $this->record->hairType->nama,
            $this->record->faceShape->nama,
            $this->record->activity->nama,
            $this->record->hairStyle->nama
        );
    }

}
