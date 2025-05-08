<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Rule;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\RuleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RuleResource\RelationManagers;

class RuleResource extends Resource
{
    protected static ?string $model = Rule::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Expert System Rules';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('activity_id')
                    ->label('Activity')
                    ->relationship('activity', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('hair_type_id')
                    ->label('Hair Type')
                    ->relationship('hairType', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('face_shape_id')
                    ->label('Face Shape')
                    ->relationship('faceShape', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('hair_style_id')
                    ->label('Hair Style')
                    ->relationship('hairStyle', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hairType.nama')
                    ->label('Hair Type')
                    ->searchable(),
                TextColumn::make('faceShape.nama')
                    ->label('Face Shape')
                    ->searchable(),
                TextColumn::make('activity.nama')
                    ->label('Activity')
                    ->searchable(),
                TextColumn::make('hairStyle.nama')
                    ->label('Hair Style')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->using(function (Model $record) {
                        \App\Filament\Resources\RuleResource::removeRuleFromProlog(
                            $record->hairType->nama,
                            $record->faceShape->nama,
                            $record->activity->nama,
                            $record->hairStyle->nama
                        );
                        $record->delete();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function addRuleToProlog(string $hairType, string $faceShape, string $activity, string $hairStyle): void
    {
        $filePath = storage_path('app/facts/rules.pl');

        if (!file_exists(dirname($filePath))) {
            mkdir(dirname($filePath), 0777, true);
        }

        $hairTy = str_replace(' ', '_', strtolower($hairType));
        $hairSt = str_replace(' ', '_', strtolower($hairStyle));
        $face = str_replace(' ', '_', strtolower($faceShape));
        $activ = str_replace(' ', '_', strtolower($activity));

        $recommendation = "hair_style('$hairSt') :- hair_type('$hairTy'), face_shape('$face'), activity('$activ').\n";

        $isiFile = file_exists($filePath) ? file_get_contents($filePath) : '';

        if (!str_contains($isiFile, $recommendation)) {
            $isiBaru = $recommendation . $isiFile;
            file_put_contents($filePath, $isiBaru);
        }
    }

    public static function removeRuleFromProlog(string $hairType, string $faceShape, string $activity, string $hairStyle): void
    {
        $filePath = storage_path('app/facts/rules.pl');

        if (!file_exists($filePath)) {
            return;
        }
        $hairTy = str_replace(' ', '_', strtolower($hairType));
        $hairSt = str_replace(' ', '_', strtolower($hairStyle));
        $face = str_replace(' ', '_', strtolower($faceShape));
        $activ = str_replace(' ', '_', strtolower($activity));

        $recommendation = "hair_style('$hairSt') :- hair_type('$hairTy'), face_shape('$face'), activity('$activ').\n";

        $isiFile = file_get_contents($filePath);
        $isiBaru = str_replace($recommendation . "\n", '', $isiFile);
        $isiBaru = str_replace($recommendation, '', $isiBaru);

        file_put_contents($filePath, $isiBaru);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRules::route('/'),
            'create' => Pages\CreateRule::route('/create'),
            'edit' => Pages\EditRule::route('/{record}/edit'),
        ];
    }
}
