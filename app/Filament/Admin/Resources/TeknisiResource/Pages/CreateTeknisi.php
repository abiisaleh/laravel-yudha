<?php

namespace App\Filament\Admin\Resources\TeknisiResource\Pages;

use App\Filament\Admin\Resources\TeknisiResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateTeknisi extends CreateRecord
{
    protected static string $resource = TeknisiResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['jenis'] = 'teknisi';

        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {
        $toko = static::getModel()::create($data);

        // //buat user
        $user = User::factory()->create([
            'password' => 'demo1234',
            'role' => 'teknisi',
        ]);

        // //simpan relasi
        DB::table('toko_user')->insert([
            'toko_id' => $toko->id,
            'user_id' => $user->id,
        ]);

        return $toko;
    }
}
