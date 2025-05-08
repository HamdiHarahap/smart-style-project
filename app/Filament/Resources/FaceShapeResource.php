<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\FaceShape;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FaceShapeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FaceShapeResource\RelationManagers;

class FaceShapeResource extends Resource
{
    protected static ?string $model = FaceShape::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Face Shape')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Face Shape')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->using(function (Model $record) {
                        \App\Filament\Resources\FaceShapeResource::removeShapeFromProlog($record->nama);
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

    public static function addShapeToProlog(string $nama): void
    {
        $filePath = storage_path('app/facts/rules.pl');

        if (!file_exists(dirname($filePath))) {
            mkdir(dirname($filePath), 0777, true);
        }

        $namaProlog = str_replace(' ', '_', strtolower($nama));
        $fakta = "face_shape('$namaProlog').\n";

        $isiFile = file_exists($filePath) ? file_get_contents($filePath) : '';

        $isiBaru = $fakta . $isiFile;

        file_put_contents($filePath, $isiBaru);
    }

    public static function removeShapeFromProlog(string $nama): void
    {
        $filePath = storage_path('app/facts/rules.pl');

        if (!file_exists($filePath)) {
            return;
        }

        $namaProlog = str_replace(' ', '_', strtolower($nama));
        $fakta = "face_shape('$namaProlog').";

        $isiFile = file_get_contents($filePath);

        $isiBaru = str_replace($fakta . "\n", '', $isiFile);
        $isiBaru = str_replace($fakta, '', $isiBaru);

        file_put_contents($filePath, $isiBaru);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaceShapes::route('/'),
            'create' => Pages\CreateFaceShape::route('/create'),
            'edit' => Pages\EditFaceShape::route('/{record}/edit'),
        ];
    }
}
