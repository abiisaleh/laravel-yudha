<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Toko;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Distributor', Toko::where('jenis', 'distributor')->count()),
            Stat::make('Total Teknisi', Toko::where('jenis', 'teknisi')->count()),
            Stat::make('Total Pelanggan', User::where('role', 'pelanggan')->count()),
        ];
    }
}
