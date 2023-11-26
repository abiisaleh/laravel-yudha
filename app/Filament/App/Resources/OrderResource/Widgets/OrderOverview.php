<?php

namespace App\Filament\App\Resources\OrderResource\Widgets;

use App\Filament\App\Resources\OrderResource\Pages\ListOrders;
use Filament\Widgets\Concerns\InteractsWithPageTable;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class OrderOverview extends BaseWidget
{
    use InteractsWithPageTable;

    protected function getTablePage(): string
    {
        return ListOrders::class;
    }

    protected function getStats(): array
    {
        if (auth()->user()->role == 'distributor') {
            return [
                Stat::make('Total Pendapatan', 'Rp ' . number_format($this->getPageTableQuery()->join('order_barang', 'orders.id', '=', 'order_id')->sum('order_barang.subtotal'))),
                Stat::make('Total Pesanan', $this->getPageTableQuery()->count()),
                Stat::make('Total Pelanggan', $this->getPageTableQuery()->groupBy('user_id')->count()),
            ];
        }

        return [];
    }
}
