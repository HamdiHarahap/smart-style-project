<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\HairStyle;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\HairStyleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HairStyleResource\RelationManagers;

class HairStyleResource extends Resource
{
    protected static ?string $model = HairStyle::class;

    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

    protected static ?string $navigationGroup = 'Hairstyle Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Style Name')
                    ->required(),
                Textarea::make('deskripsi')
                    ->label('Description')
                    ->required(),
                FileUpload::make('gambar')
                    ->label('Image')
                    ->columnSpanFull()
                    ->image()
                    ->directory('hairstyle')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Style Name')
                    ->searchable(),
                TextColumn::make('deskripsi')
                    ->label('Description')
                    ->wrap(),
                ImageColumn::make('gambar')
                    ->label('Image')
                    ->columnSpanFull()
                    ->disk('public') 
                    ->url(fn ($record) => (asset('storage/' . $record->gambar))) 
                    ->size(70),
            ])
            ->filters([ 
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListHairStyles::route('/'),
            'create' => Pages\CreateHairStyle::route('/create'),
            'edit' => Pages\EditHairStyle::route('/{record}/edit'),
        ];
    }
}
