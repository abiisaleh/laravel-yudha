<?php

namespace App\Filament\Admin\Resources\TeknisiResource\Pages;

use App\Filament\Admin\Resources\TeknisiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeknisi extends EditRecord
{
    protected static string $resource = TeknisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
