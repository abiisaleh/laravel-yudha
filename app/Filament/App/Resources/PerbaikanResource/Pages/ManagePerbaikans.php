<?php

namespace App\Filament\App\Resources\PerbaikanResource\Pages;

use App\Filament\App\Resources\PerbaikanResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Resources\Pages\ManageRecords;

class ManagePerbaikans extends ManageRecords
{
    protected static string $resource = PerbaikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ActionGroup::make([
                Action::make('laporan_harian')->url(route('print', ['jenis' => 'perbaikan', 'id' => 1, 'waktu' => 'harian']))->openUrlInNewTab(),
                Action::make('laporan_bulanan')->url(route('print', ['jenis' => 'perbaikan', 'id' => 1, 'waktu' => 'bulanan']))->openUrlInNewTab(),
                Action::make('laporan_tahunan')->url(route('print', ['jenis' => 'perbaikan', 'id' => 1, 'waktu' => 'tahunan']))->openUrlInNewTab(),
            ])
                ->label('Print')
                ->icon('heroicon-m-printer')
                ->color('primary')
                ->button()
        ];
    }
}
