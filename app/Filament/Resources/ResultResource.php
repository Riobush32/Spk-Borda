<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResultResource\Pages;
use App\Filament\Resources\ResultResource\RelationManagers;
use App\Models\Result;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Hexters\HexaLite\HasHexaLite;


class ResultResource extends Resource
{
    use HasHexaLite;
    protected static ?string $model = Result::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Results';


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
                Tables\Columns\TextColumn::make('alternative.alternative_name')
                    ->label('Alternatif')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ranking')
                    ->label('Ranking')
                    ->searchable(),
                Tables\Columns\TextColumn::make('result')
                    ->label('Nilai'),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListResults::route('/'),
            'create' => Pages\CreateResult::route('/create'),
            'edit' => Pages\EditResult::route('/{record}/edit'),
            'print' => Pages\PrintReport::route('/print'), // Tambahkan ini
        ];
    }

    public static function canAccess(): bool
    {
        return hexa()->can('result.index'); // ✅ Kontrol visibilitas
    }

    public static function defineGates(): array
    {
        return [
            'result.index' => 'Melihat daftar result',
            'result.print_report' => 'Print Laporan',
        ];
    }
}
