<?php

namespace App\Filament\App\Resources\OrderResource\Widgets;

use App\Filament\App\Resources\OrderResource\Pages\ListOrders;
use App\Models\Order;
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
                Stat::make('Total Pendapatan', 'Rp ' . number_format(Order::where('toko_id', filament()->getTenant()->id)->join('order_barang', 'orders.id', '=', 'order_id')->sum('order_barang.subtotal'))),
                Stat::make('Total Pesanan', Order::where('toko_id', filament()->getTenant()->id)->count()),
                Stat::make('Total Pelanggan', Order::where('toko_id', filament()->getTenant()->id)->groupBy('user_id')->count()),
            ];
        }

        return [];
    }
}
