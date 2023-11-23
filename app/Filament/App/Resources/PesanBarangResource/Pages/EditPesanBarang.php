<?php

namespace App\Filament\App\Resources\PesanBarangResource\Pages;

use App\Filament\App\Resources\PesanBarangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPesanBarang extends EditRecord
{
    protected static string $resource = PesanBarangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
