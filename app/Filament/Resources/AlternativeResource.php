<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Alternative;
use Filament\Resources\Resource;
use Filament\Forms\Components\Radio;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AlternativeResource\Pages;
use Illuminate\Validation\Rule;
use App\Filament\Resources\AlternativeResource\RelationManagers;
use Hexters\HexaLite\HasHexaLite;

class AlternativeResource extends Resource
{
    use HasHexaLite;
    protected static ?string $model = Alternative::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';
    protected static ?string $navigationGroup = 'Data';

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('alternative_name')
                    ->label('Nama')
                    ->required(),
                Forms\Components\TextInput::make('alternative_code')
                    ->label('Kode')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->validationMessages([
                        'required' => 'kode Alternatif tidak boleh kosong',
                        'unique' => 'Kode alternatif sudah digunakan, silakan pilih yang lain.',
                    ]),
                Radio::make('gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ]),
                Forms\Components\TextInput::make('nik')
                    ->label('NIK')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('job')
                    ->label('Pekerjaan')
                    ->required(),
                Forms\Components\TextInput::make('family_members')
                    ->label('Jumlah Anggota Keluarga')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('address')
                    ->label('Alamat')
                    ->required(),
                Forms\Components\TextInput::make('total_blt')
                    ->label('Total BLT')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('alternative_code')
                    ->label('Kode')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alternative_name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->label('Gender')
                    ->wrap()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nik')
                    ->label('NIK')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('job')
                    ->label('Pekerjaan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('family_members')
                    ->label('Anggota Keluarga')
                    ->wrap()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->label('Alamat')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_blt')
                    ->label('Total BLT')
                    ->searchable()
                    ->sortable()
                    ->money('IDR'),

            ])
            ->filters([
                Tables\Filters\SelectFilter::make('address')
                    ->label('Alamat')
                    ->options(Alternative::pluck('address', 'address')),
                Tables\Filters\SelectFilter::make('job')
                    ->label('Pekerjaan')
                    ->options(Alternative::pluck('job', 'job')),
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
            'index' => Pages\ListAlternatives::route('/'),
            'create' => Pages\CreateAlternative::route('/create'),
            'edit' => Pages\EditAlternative::route('/{record}/edit'),
        ];
    }
    public static function canAccess(): bool
    {
        return hexa()->can('alternative.index'); // ✅ Kontrol visibilitas
    }

    public static function defineGates(): array
    {
        return [
            'alternative.index' => 'Melihat daftar alternatif',
            'alternative.create' => 'Menambah alternatif',
            'alternative.edit' => 'Mengedit alternatif',
            'alternative.delete' => 'Menghapus alternatif',
        ];
    }
}
