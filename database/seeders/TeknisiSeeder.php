<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeknisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tokos = [
            [
                'nama' => 'Bima service',
                'jenis' => 'teknisi',
                'kelurahan' => 'Awiyo',
                'kecamatan' => 'Abepura',
                'alamat' => 'tanah hitam'
            ],
            [

                'nama' => 'Wira cell tanah',
                'jenis' => 'teknisi',
                'kelurahan' => 'Awiyo',
                'kecamatan' => 'Abepura',
                'alamat' => 'hitam depan hypermart',
            ],
            [

                'nama' => 'Murah cell',
                'jenis' => 'teknisi',
                'kelurahan' => 'Yobe',
                'kecamatan' => 'Abepura',
                'alamat' => 'jln veteran pasar lama abe',
            ],
            [

                'nama' => 'MU71 phone',
                'jenis' => 'teknisi',
                'kelurahan' => 'Yobe',
                'kecamatan' => 'Abepura',
                'alamat' => 'pasar lama abe',
            ],
            [

                'nama' => 'Zero phone',
                'jenis' => 'teknisi',
                'kelurahan' => 'Kota Baru',
                'kecamatan' => 'Abepura',
                'alamat' => 'lingkaran sebelah bank mandiri',
            ],
            [

                'nama' => 'Salsa phone',
                'jenis' => 'teknisi',
                'kelurahan' => 'Way Mhorock',
                'kecamatan' => 'Abepura',
                'alamat' => 'jln raya abepura samping bank BTN',
            ],
        ];

        foreach ($tokos as $toko) {
            DB::table('toko_user')->insert([
                [
                    'toko_id' => \App\Models\Toko::factory()->create($toko)->id,
                    'user_id' => \App\Models\User::factory()->create([
                        'password' => 'demo1234',
                        'role' => 'teknisi',
                    ])->id,
                ],
            ]);
        }
    }
}
