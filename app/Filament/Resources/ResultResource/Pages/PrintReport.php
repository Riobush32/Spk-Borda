<?php

namespace App\Filament\Resources\ResultResource\Pages;

use App\Models\Poll;
use App\Models\Result;
use Filament\Resources\Pages\Page;
use App\Filament\Resources\ResultResource;
use Illuminate\Contracts\Support\Htmlable;

class PrintReport extends Page
{
    protected static string $resource = ResultResource::class;
    protected static ?string $navigationIcon = 'heroicon-o-printer';
    protected static bool $shouldRegisterNavigation = false; // Sembunyikan dari menu

    protected static string $view = 'filament.resources.result-resource.pages.print-report';

    public function getTitle(): string|Htmlable
    {
        return __('Cetak Laporan');
    }

    public static function getSlug(): string
    {
        return 'print-report';
    }

    // Data untuk laporan (contoh)
    public function getReportData(): array
    {
        $results=Result::all();
        $polls = Poll::all();
        return [
            'nomor_laporan' => '123/DP/VI/2024',
            'tanggal' => now()->format('d F Y'),
            'kepala_desa' => 'Ahmad Sudirman, S.Sos',
            'nip' => '19751210 200801 1 001',
            'results' => $results,
            'polls' => $polls,
        ];
    }
}
