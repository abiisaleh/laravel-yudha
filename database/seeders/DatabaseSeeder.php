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
            'name' => 'eko wahyu',
            'email' => 'ekowahyu@demo.com',
            'password' => 'demo1234',
            'verified' => true,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'yudha',
            'email' => 'yudha@demo.com',
            'password' => 'demo1234',
            'role' => 'admin',
            'verified' => true,
        ]);

        DB::table('toko_user')->insert([
            [
                'toko_id' => \App\Models\Toko::factory()->create([
                    'nama' => 'Erik Cell',
                    'jenis' => 'teknisi',
                    'alamat' => 'Jl. Raya Abepura, (Depan Kantor BPJS)',
                    'kecamatan' => 'Abepura',
                    'kelurahan' => 'Wahno',
                ])->id,
                'user_id' => \App\Models\User::factory()->create([
                    'name' => 'Erik Tandian',
                    'email' => 'erik@demo.com',
                    'password' => 'demo1234',
                    'role' => 'teknisi',
                    'verified' => true,
                ])->id,
            ],
            [
                'toko_id' => \App\Models\Toko::factory()->create([
                    'nama' => 'Samsung Center Abepura',
                    'jenis' => 'distributor',
                    'alamat' => 'samping bank BTN Abepura',
                    'kecamatan' => 'Abepura',
                    'kelurahan' => 'Kota Baru',
                ])->id,
                'user_id' =>  \App\Models\User::factory()->create([
                    'name' => 'syafiq',
                    'email' => 'syafiq@demo.com',
                    'password' => 'demo1234',
                    'role' => 'distributor',
                    'verified' => true,
                ])->id,
            ],
        ]);

        $this->call([
            TeknisiSeeder::class,
            BarangSeeder::class,
        ]);
    }
}
