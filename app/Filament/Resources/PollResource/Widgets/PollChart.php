<?php

namespace App\Filament\Resources\PollResource\Widgets;

use App\Models\Poll;
use Filament\Widgets\ChartWidget;

class PollChart extends ChartWidget
{
    protected static ?string $heading = 'Ranking Alternatif yang dibuat Oleh Setiap Voter';
    protected int | string | array $columnSpan = 'full';

    protected function getType(): string
    {
        return 'line';
    }

    protected function getData(): array
    {
        $polls = Poll::with(['voter', 'alternative'])->get();

        if ($polls->isEmpty()) {
            return [
                'labels' => [],
                'datasets' => [],
            ];
        }

        // Alternatif jadi sumbu X (labels)
        $alternatives = $polls->pluck('alternative.alternative_name')->unique()->values();
        $voters = $polls->pluck('voter.user.name')->unique()->values();

        $datasets = [];

        foreach ($voters as $voter) {
            $data = [];

            foreach ($alternatives as $alt) {
                // Ambil ranking dari voter terhadap alternative
                $ranking = $polls->firstWhere(
                    fn($p) =>
                    $p->voter->user->name === $voter &&
                        $p->alternative->alternative_name === $alt
                )?->ranking;

                $data[] = $ranking ?? 0;
            }

            $datasets[] = [
                'label' => $voter,
                'data' => $data,
                'borderColor' => '#' . substr(md5($voter), 0, 6),
                'fill' => false,
                'tension' => 0.3,
            ];
        }

        return [
            'labels' => $alternatives->toArray(),
            'datasets' => $datasets,
        ];
    }

    protected function getOptions(): ?array
    {
        return [
            'responsive' => true,
            'plugins' => [
                'legend' => [
                    'position' => 'top',
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'title' => [
                        'display' => true,
                        'text' => 'Ranking',
                    ],
                ],
                'x' => [
                    'title' => [
                        'display' => true,
                        'text' => 'Alternative',
                    ],
                ],
            ],
        ];
    }
}
