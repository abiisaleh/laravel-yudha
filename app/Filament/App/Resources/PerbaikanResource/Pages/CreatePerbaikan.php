<?php

namespace App\Filament\App\Resources\PerbaikanResource\Pages;

use App\Filament\App\Resources\PerbaikanResource;
use Filament\Actions;
use Filament\Facades\Filament;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreatePerbaikan extends CreateRecord
{
    protected static string $resource = PerbaikanResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $data['user_id'] = auth()->id();

        $record = new ($this->getModel())($data);

        $record->save();

        return $record;
    }
}
