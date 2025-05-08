<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Dotenv\Util\Str;
use Filament\Tables;
use App\Models\Activity;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ActivityResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ActivityResource\RelationManagers;

class ActivityResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Activity')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Activity')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->using(function (Model $record) {
                        \App\Filament\Resources\ActivityResource::removeActivityFromProlog($record->nama);
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

    public static function addActivityToProlog(string $nama): void
    {
        $filePath = storage_path('app/facts/rules.pl');

        if (!file_exists(dirname($filePath))) {
            mkdir(dirname($filePath), 0777, true);
        }

        $namaProlog = str_replace(' ', '_', strtolower($nama));
        $fakta = "activity('$namaProlog').\n";

        $isiFile = file_exists($filePath) ? file_get_contents($filePath) : '';

        $isiBaru = $fakta . $isiFile;

        file_put_contents($filePath, $isiBaru);
    }

    public static function removeActivityFromProlog(string $nama): void
    {
        $filePath = storage_path('app/facts/rules.pl');

        if (!file_exists($filePath)) {
            return;
        }

        $namaProlog = str_replace(' ', '_', strtolower($nama));
        $fakta = "activity('$namaProlog').";

        $isiFile = file_get_contents($filePath);

        $isiBaru = str_replace($fakta . "\n", '', $isiFile);
        $isiBaru = str_replace($fakta, '', $isiBaru);

        file_put_contents($filePath, $isiBaru);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListActivities::route('/'),
            'create' => Pages\CreateActivity::route('/create'),
            'edit' => Pages\EditActivity::route('/{record}/edit'),
        ];
    }
}
