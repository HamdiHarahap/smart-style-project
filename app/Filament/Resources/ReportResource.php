<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Filament\Resources\ReportResource\RelationManagers;
use App\Models\Report;
use Dom\Text;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\text;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Report';

    protected static ?int $navigationSort = 99;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_user')
                    ->label('Name'),
                TextColumn::make('email')
                    ->label('Email'),
                TextColumn::make('rule.hairType.nama')
                    ->label('Hair Type'),
                TextColumn::make('rule.faceShape.nama')
                    ->label('Face Shape'),
                TextColumn::make('rule.activity.nama')
                    ->label('Activity'),
                TextColumn::make('rule.hairStyle.nama')
                    ->label('Hair Style'),
            ])
            ->filters([
                //
            ])
            ->actions([
                
            ])
            ->headerActions([
                Tables\Actions\Action::make('Download All Reports')
                    ->label('Download PDF')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function () {
                        $reports = \App\Models\Report::with(['rule.hairType', 'rule.faceShape', 'rule.activity', 'rule.hairStyle'])->get();
                        
                        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.report', [
                            'reports' => $reports,
                        ]);
            
                        return response()->streamDownload(
                            fn () => print($pdf->stream()),
                            'smartstyle-report.pdf'
                        );
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

    public static function canCreate(): bool
    {
        return false;
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
