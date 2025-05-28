<?php

namespace App\Filament\Resources\ResultResource\Pages;

use App\Models\Poll;
use App\Models\Voter;
use Filament\Actions;
use App\Models\Result;
use App\Models\Alternative;
use Filament\Support\Colors\Color;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\ResultResource;
use Filament\Support\Facades\FilamentColor;
use App\Filament\Resources\ResultResource\Pages\PrintReport;

class ListResults extends ListRecords
{
    protected static string $resource = ResultResource::class;

    protected function getHeaderActions(): array
    {
        return [

            // Actions\CreateAction::make(),
            Actions\Action::make('Report')
                ->icon('heroicon-o-clipboard-document-list')
                ->color(Color::Indigo)
                ->url(fn(): string => PrintReport::getUrl()),
            Actions\Action::make('Proccess Result')
                ->icon('heroicon-o-variable')
                ->color('primary')
                ->action(function () {
                    // Nilai N = Jumlah Alternatif - Ranking
                    $alternatives = Alternative::all();
                    $jumlahAlternatif = $alternatives->count();
                    $results = [];
                    foreach ($alternatives as $alternative) {
                        $RangkingAlternatifDariMasingVoter = Poll::where('alternative_id', $alternative->id)->get();
                        $result = 0;
                        foreach ($RangkingAlternatifDariMasingVoter as $ranking) {
                            $n = 0;
                            $n = $jumlahAlternatif - $ranking->ranking;
                            $valueVoter = Voter::find($ranking->voter_id);
                            $result += $n * $valueVoter->voter_value;
                        }
                        $results[] = [
                            'alternative_id' => $alternative->id,
                            'result' => $result,
                        ];
                    }
                    // Urutkan berdasarkan nilai result (descending)
                    usort($results, fn($a, $b) => $b['result'] <=> $a['result']);
                    // Tambahkan ranking
                    $ranking = 1;
                    $previousResult = null;
                    $repeatCount = 0;
                    foreach ($results as $index => &$item) {
                        if ($item['result'] === $previousResult) {
                            $item['rank'] = $ranking;
                            $repeatCount++;
                        } else {
                            $ranking += $repeatCount;
                            $item['rank'] = $ranking;
                            $previousResult = $item['result'];
                            $repeatCount = 1;
                        }
                    }
                    unset($item); // good practice
                    foreach ($results as $result) {
                        Result::updateOrCreate(
                            [
                                'alternative_id' => $result['alternative_id'],
                            ],
                            [
                                'result' => $result['result'],
                                'ranking' => $result['rank'],
                            ]
                        );
                    }
                }),
        ];
    }
}
