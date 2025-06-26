<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use App\Models\Poll;
use Filament\Tables;
use App\Models\Voter;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Alternative;
use Illuminate\Validation\Rule;
use Filament\Resources\Resource;
use Hexters\HexaLite\HasHexaLite;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PollResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PollResource\RelationManagers;

class PollResource extends Resource
{
    use HasHexaLite;
    protected static ?string $model = Poll::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Ranking';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('voter_id')
                    ->label('Voter')
                    ->options(Voter::with('user')
                        ->where('user_id', Auth::user()->id) // Hanya menampilkan voter yang terkait dengan user yang sedang login
                        ->get()
                        ->pluck('user.name', 'id') // 'user.name' adalah nama user dari relasi
                        ->toArray())
                    ->searchable()
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn(callable $set) => $set('alternative_id', null)),

                Forms\Components\Select::make('alternative_id')
                    ->label('Alternative')
                    ->options(function (Get $get, \Filament\Forms\Get $form, $livewire): array {
                        // Jika sedang edit, tampilkan semua alternative
                        if (method_exists($livewire, 'getRecord') && $livewire->getRecord()) {
                            return Alternative::all()
                                ->mapWithKeys(function ($alt) {
                                    return [
                                        $alt->id => $alt->alternative_name . ' - ' . $alt->alternative_code,
                                    ];
                                })
                                ->toArray();
                        }

                        $voterId = $get('voter_id');

                        // Jika belum ada voter_id yang dipilih
                        if (!$voterId) {
                            return Alternative::all()
                                ->mapWithKeys(function ($alt) {
                                    return [
                                        $alt->id => $alt->alternative_name . ' - ' . $alt->alternative_code,
                                    ];
                                })
                                ->toArray();
                        }

                        // Jika voter_id sudah dipilih, filter alternative yang belum dipilih voter tsb
                        $selectedAlternatives = Poll::where('voter_id', $voterId)
                            ->pluck('alternative_id')
                            ->toArray();

                        return Alternative::whereNotIn('id', $selectedAlternatives)
                            ->get()
                            ->mapWithKeys(function ($alt) {
                                return [
                                    $alt->id => $alt->alternative_name . ' - ' . $alt->alternative_code,
                                ];
                            })
                            ->toArray();
                    }),
                Forms\Components\TextInput::make('ranking')
                    ->label('Ranking')
                    ->numeric()
                    ->required()
                    ->disabled(fn($livewire) => $livewire instanceof EditRecord) // Disable saat edit
                    ->rules(function (Get $get, $state, $livewire) {
                        // Jika sedang edit, hilangkan rules
                        if ($livewire instanceof EditRecord) {
                            return []; // Tidak ada validasi saat edit
                        }

                        return [
                            function (string $attribute, $value, Closure $fail) use ($get) {
                                $voterId = $get('voter_id');

                                if (!$voterId) {
                                    $fail('Pilih voter terlebih dahulu.');
                                    return;
                                }

                                $maxRanking = Poll::where('voter_id', $voterId)->max('ranking') ?? 0;

                                if ($value > $maxRanking + 1) {
                                    $fail("Ranking harus berurutan tanpa gap. Ranking tertinggi saat ini: {$maxRanking}");
                                }

                                if ($value <= $maxRanking) {
                                    $fail('Ranking harus lebih besar dari ranking sebelumnya (' . ($maxRanking) . ')');
                                }
                            },
                        ];
                    })
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('voter.user.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('alternative.alternative_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('ranking')
                    ->sortable()
                    ->searchable()
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
            'index' => Pages\ListPolls::route('/'),
            'create' => Pages\CreatePoll::route('/create'),
            'edit' => Pages\EditPoll::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return hexa()->can('poll.index'); // ✅ Kontrol visibilitas
    }

    public static function defineGates(): array
    {
        return [
            'poll.index' => 'Melihat daftar poll',
            'poll.create' => 'Menambah poll',
            'poll.edit' => 'Mengedit poll',
            'poll.delete' => 'Menghapus poll',
        ];
    }
}
