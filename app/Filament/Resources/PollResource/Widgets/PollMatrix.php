<?php

namespace App\Filament\Resources\PollResource\Widgets;

use App\Models\Poll;
use Filament\Widgets\Widget;

class PollMatrix extends Widget
{
    protected static string $view = 'filament.resources.poll-resource.widgets.poll-matrix';
    protected int | string | array $columnSpan = 'full';
    public function getMatrixData(): array
    {
        $polls = Poll::with(['voter', 'alternative'])->get();

        $voters = $polls->pluck('voter.user.name')->unique()->values();
        $alternatives = $polls->pluck('alternative.alternative_name')->unique()->values();

        $matrix = [];

        foreach ($alternatives as $alt) {
            $row = ['alternative' => $alt];
            foreach ($voters as $voter) {
                $ranking = $polls->firstWhere(fn($p) => $p->voter->user->name === $voter && $p->alternative->alternative_name === $alt)?->ranking;
                $row[$voter] = $ranking ?? '-';
            }
            $matrix[] = $row;
        }

        return [
            'headers' => $voters,
            'rows' => $matrix,
        ];
    }
}
