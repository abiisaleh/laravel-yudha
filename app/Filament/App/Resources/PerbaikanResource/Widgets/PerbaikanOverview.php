<?php

namespace App\Filament\App\Resources\PerbaikanResource\Widgets;

use App\Livewire\ListPerbaikan;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PerbaikanOverview extends BaseWidget
{
    use InteractsWithPageTable;

    protected function getTablePage(): string
    {
        return ListPerbaikan::class;
    }

    protected function getStats(): array
    {
        if (auth()->user()->role == 'teknisi') {
            return [
                Stat::make('Total Pendapatan', 'Rp ' . number_format($this->getPageTableQuery()->sum('biaya'))),
                Stat::make('Total Perbaikan', $this->getPageTableQuery()->count()),
                Stat::make('Total Pelanggan', $this->getPageTableQuery()->groupBy('email')->count()),
            ];
        }

        return [];
    }
}
