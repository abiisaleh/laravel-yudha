<?php

namespace App\Filament\App\Resources\OrderResource\Pages;

use App\Filament\App\Resources\OrderResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Facades\Filament;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ActionGroup::make([
                Action::make('laporan_harian')->url(route('print', ['jenis' => 'order', 'id' => Filament::getTenant()->id, 'waktu' => 'harian']))->openUrlInNewTab(),
                Action::make('laporan_bulanan')->url(route('print', ['jenis' => 'order', 'id' => Filament::getTenant()->id, 'waktu' => 'bulanan']))->openUrlInNewTab(),
                Action::make('laporan_tahunan')->url(route('print', ['jenis' => 'order', 'id' => Filament::getTenant()->id, 'waktu' => 'tahunan']))->openUrlInNewTab(),
            ])
                ->label('Print')
                ->icon('heroicon-m-printer')
                ->color('primary')
                ->button()
            // ->hidden(auth()->user()->role == 'teknisi')
        ];
    }
}
