<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'abiisaleh',
            'email' => 'abiisaleh@demo.com',
            'password' => 'demo1234',
            'role' => 'pelanggan',
        ]);

        DB::table('toko_user')->insert([
            [
                'toko_id' => \App\Models\Toko::factory()->create([
                    'nama' => 'Samsung Service Center',
                    'alamat' => 'Jl. Raya Abepura, (Depan Kantor BPJS)',
                    'kecamatan' => 'Abepura',
                    'kelurahan' => 'Wahno',
                    'lat' => '',
                    'lng' => '',
                ])->id,
                'user_id' => \App\Models\User::factory()->create([
                    'name' => 'yudha',
                    'email' => 'yudha@demo.com',
                    'password' => 'demo1234',
                    'role' => 'teknisi',
                ])->id,
            ],
            [
                'toko_id' => \App\Models\Toko::factory()->create([
                    'nama' => 'Salsa Cell',
                    'alamat' => 'samping bank BTN Abepura',
                    'kecamatan' => 'Abepura',
                    'kelurahan' => 'Kota Baru',
                    'lat' => '',
                    'lng' => '',
                ])->id,
                'user_id' =>  \App\Models\User::factory()->create([
                    'name' => 'syafiq',
                    'email' => 'syafiq@demo.com',
                    'password' => 'demo1234',
                    'role' => 'distributor',
                ])->id,
            ],
        ]);
    }
}
