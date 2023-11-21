<?php

namespace App\Filament\Resources\PerbaikanResource\Pages;

use App\Filament\Resources\PerbaikanResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePerbaikans extends ManageRecords
{
    protected static string $resource = PerbaikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
