<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lombas')->insert([
            'idLomba' => '123',
            'namaLomba' => 'Lomba PKM',
            'kategoriLomba' => 'DIKTI',
            'kapasitas' => 3,
            'batasPendaftaran' => '2023-06-22',
            'penyelenggara' => 'UB',
            'biaya' => '100000'
        ]);
    }
}
