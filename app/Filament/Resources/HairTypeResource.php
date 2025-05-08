<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\HairType;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Log;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\HairTypeResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HairTypeResource\RelationManagers;

class HairTypeResource extends Resource
{
    protected static ?string $model = HairType::class;

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Hair Type')
                    ->required(),
                Select::make('kategori')
                    ->label('Category')
                    ->required()
                    ->options([
                        'Straight' => 'Straight',
                        'Wavy' => 'Wavy',
                        'Curly' => 'Curly',
                        'Coily' => 'Coily'
                    ]),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Hair Type'),
                TextColumn::make('kategori')
                    ->label('Category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Straight' => 'info',
                        'Wavy' => 'success',
                        'Curly' => 'warning',
                        'Coily' => 'danger',
                        default => 'gray',
                    })

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->using(function (Model $record) {
                        \App\Filament\Resources\HairTypeResource::removeHairTypeFromProlog($record->nama);
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHairTypes::route('/'),
            'create' => Pages\CreateHairType::route('/create'),
            'edit' => Pages\EditHairType::route('/{record}/edit'),
        ];
    }

    public static function addHairTypeToProlog(string $nama): void
    {
        $filePath = storage_path('app/facts/rules.pl');

        if (!file_exists(dirname($filePath))) {
            mkdir(dirname($filePath), 0777, true);
        }

        $namaProlog = str_replace(' ', '_', strtolower($nama));
        $fakta = "hair_type('$namaProlog').\n";

        $isiFile = file_exists($filePath) ? file_get_contents($filePath) : '';

        $isiBaru = $fakta . $isiFile;

        file_put_contents($filePath, $isiBaru);
    }

    public static function removeHairTypeFromProlog(string $nama): void
    {
        $filePath = storage_path('app/facts/rules.pl');

        if (!file_exists($filePath)) {
            return;
        }

        $namaProlog = str_replace(' ', '_', strtolower($nama));
        $fakta = "hair_type('$namaProlog').";

        $isiFile = file_get_contents($filePath);

        $isiBaru = str_replace($fakta . "\n", '', $isiFile);
        $isiBaru = str_replace($fakta, '', $isiBaru);

        file_put_contents($filePath, $isiBaru);
    }
}
