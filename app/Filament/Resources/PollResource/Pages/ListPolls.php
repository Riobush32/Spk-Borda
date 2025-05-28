<?php

namespace App\Filament\Resources\PollResource\Pages;

use Filament\Actions;
use App\Filament\Resources\PollResource;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\PollResource\Widgets\PollMatrix;
use App\Filament\Resources\PollResource\Widgets\PollTablePerVoter;

class ListPolls extends ListRecords
{
    protected static string $resource = PollResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            PollMatrix::class,
        ];
    }
}
