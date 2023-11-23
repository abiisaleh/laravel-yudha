<?php

namespace App\Filament\Admin\Resources\DistributorResource\Pages;

use App\Filament\Admin\Resources\DistributorResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateDistributor extends CreateRecord
{
    protected static string $resource = DistributorResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['jenis'] = 'distributor';

        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {
        $toko = static::getModel()::create($data);

        // //buat user
        $user = User::factory()->create([
            'password' => 'demo1234',
            'role' => 'distributor',
        ]);

        // //simpan relasi
        DB::table('toko_user')->insert([
            'toko_id' => $toko->id,
            'user_id' => $user->id,
        ]);

        return $toko;
    }
}
