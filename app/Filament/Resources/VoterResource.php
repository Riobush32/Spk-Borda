<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Voter;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Hexters\HexaLite\HasHexaLite;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VoterResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VoterResource\RelationManagers;

class VoterResource extends Resource
{
    use HasHexaLite;
    protected static ?string $model = Voter::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Data';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Voter')
                    ->options(User::all()->pluck('name', 'id')->toArray())
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('voter_code')->required(),
                Forms\Components\TextInput::make('voter_value')
                    ->label('Value')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->searchable(),
                Tables\Columns\TextColumn::make('voter_code')->searchable(),
                Tables\Columns\TextColumn::make('voter_value')
                    ->label('Value')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListVoters::route('/'),
            'create' => Pages\CreateVoter::route('/create'),
            'edit' => Pages\EditVoter::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return hexa()->can('voter.index'); // ✅ Kontrol visibilitas
    }

    public static function defineGates(): array
    {
        return [
            'voter.index' => 'Melihat daftar voter',
            'voter.create' => 'Menambah voter',
            'voter.edit' => 'Mengedit voter',
            'voter.delete' => 'Menghapus voter',
        ];
    }
}
