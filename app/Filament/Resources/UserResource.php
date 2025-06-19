<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Hexters\HexaLite\HasHexaLite;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    use HasHexaLite;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function canAccess(): bool
    {
        return hexa()->can('user.index'); // ✅ Kontrol visibilitas
    }

    public function defineGates(): array
    {
        return [
            'user.index' => __('Melihat daftar user'),
            'user.create' => __('Perbolehkan membuat user baru'),
            'user.update' => __('Perbolehkan mengedit user'),
            'user.delete' => __('Perbolehkan menghapus user'),
        ];
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->unique(ignoreRecord: true)
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->unique(ignoreRecord: true)
                    ->required(),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->label('Password')
                    ->required(fn(string $context) => $context === 'create') // required hanya saat create
                    ->dehydrateStateUsing(fn($state) => filled($state) ? $state : null) // jangan isi kosong
                    ->dehydrated(fn($state) => filled($state)) // hanya simpan kalau diisi
                    ->autocomplete('new-password'),

                Forms\Components\Select::make('roles')
                    ->label(__('Role Name'))
                    ->relationship('roles', 'name')
                    ->placeholder(__('Superuser')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label(__('Role Name'))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
