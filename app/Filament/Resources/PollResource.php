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
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PollResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PollResource\RelationManagers;

class PollResource extends Resource
{
    protected static ?string $model = Poll::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'Ranking';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('voter_id')
                    ->label('Voter')
                    ->options(Voter::all()->pluck('voter_name', 'id')->toArray())
                    ->searchable()
                    ->required()
                    ->live()
                    ->afterStateUpdated(fn(callable $set) => $set('alternative_id', null)),

                Forms\Components\Select::make('alternative_id')
                    ->label('Alternative')
                    ->options(function (Get $get): array {
                        $voterId = $get('voter_id');

                        if (!$voterId) {
                            return Alternative::all()
                                ->pluck('alternative_name', 'id')
                                ->toArray();
                        }

                        $selectedAlternatives = Poll::where('voter_id', $voterId)
                            ->pluck('alternative_id')
                            ->toArray();

                        return Alternative::whereNotIn('id', $selectedAlternatives)
                            ->get()
                            ->pluck('alternative_name', 'id')
                            ->toArray();
                    })
                    ->searchable()
                    ->required()
                    ->disabled(fn(Get $get): bool => !$get('voter_id'))
                    ->getOptionLabelsUsing(function (array $values): array {
                        return Alternative::whereIn('id', $values)
                            ->get()
                            ->pluck('alternative_name', 'id')
                            ->toArray();
                    }),
                Forms\Components\TextInput::make('ranking')
                    ->label('Ranking')
                    ->numeric()
                    ->required()
                    ->rules([
                        function (Get $get) {
                            return function (string $attribute, $value, Closure $fail) use ($get) {
                                $maxRanking = Poll::where('voter_id', $get('voter_id'))->max('ranking');
                                if ($value > $maxRanking + 1) {
                                    $fail("Ranking harus berurutan tanpa gap. Ranking tertinggi saat ini: {$maxRanking}");
                                }
                                if ($value <= $maxRanking) {
                                    $fail('ranking saat ini adalah ' . $maxRanking+1);
                                }
                            };
                        }
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('voter.voter_name')
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
}
