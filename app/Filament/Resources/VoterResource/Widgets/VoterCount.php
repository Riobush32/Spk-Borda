<?php

namespace App\Filament\Resources\VoterResource\Widgets;

use App\Models\Poll;
use App\Models\Voter;
use App\Models\Alternative;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class VoterCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Voters', Voter::count())
                ->label('Total Voters')
                ->icon('heroicon-o-users')
                ->color('success')
                ->description('Total Number of Voters Listed'),
            Stat::make('Total Alternatives', Alternative::count())
                ->label('Total Alternatives')
                ->icon('heroicon-o-clipboard')
                ->color('success')
                ->description('Total Number of Alternative Listed'),
        ];
    }
}
