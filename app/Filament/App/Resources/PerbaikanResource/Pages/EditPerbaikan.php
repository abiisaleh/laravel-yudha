<?php

namespace App\Filament\App\Resources\PerbaikanResource\Pages;

use App\Filament\App\Resources\PerbaikanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPerbaikan extends EditRecord
{
    protected static string $resource = PerbaikanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $data;
    }
}
