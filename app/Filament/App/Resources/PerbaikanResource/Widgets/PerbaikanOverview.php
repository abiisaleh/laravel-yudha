<?php

namespace App\Filament\App\Resources\PerbaikanResource\Widgets;

use App\Livewire\ListPerbaikan;
use App\Models\Perbaikan;
use App\Models\PerbaikanDetail;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Database\Eloquent\Builder;


class PerbaikanOverview extends BaseWidget
{
    use InteractsWithPageTable;

    protected function getStats(): array
    {
        if (auth()->user()->role == 'teknisi') {
            return [
                Stat::make('Total Pendapatan', 'Rp ' . number_format(PerbaikanDetail::whereHas('perbaikan', fn (Builder $query) => $query->where('toko_id', filament()->getTenant()->id))->sum('total'))),
                Stat::make('Total Perbaikan', Perbaikan::where('toko_id', filament()->getTenant()->id)->count()),
                Stat::make('Total Pelanggan', Perbaikan::where('toko_id', filament()->getTenant()->id)->groupBy('email')->count()),
            ];
        }

        return [];
    }
}
