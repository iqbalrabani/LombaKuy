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
            [
                'idLomba' => '9',
                'namaLomba' => 'EBCC 3.0',
                'kategoriLomba' => 'Nasional',
                'kapasitas' => 3,
                'batasPendaftaran' => '2023-06-22',
                'penyelenggara' => 'ITS',
                'biaya' => '50000'
            ],
            [
                'idLomba' => '10',
                'namaLomba' => 'PKM',
                'kategoriLomba' => 'DIKTI',
                'kapasitas' => 3,
                'batasPendaftaran' => '2023-08-25',
                'penyelenggara' => 'KEMENDIKBUD',
                'biaya' => '10000'
            ],
            [
                'idLomba' => '11',
                'namaLomba' => 'Gemastik',
                'kategoriLomba' => 'DIKTI',
                'kapasitas' => 3,
                'batasPendaftaran' => '2023-06-29',
                'penyelenggara' => 'UNISMA',
                'biaya' => '40000'
            ],
            [
                'idLomba' => '12',
                'namaLomba' => 'BEF 6.0',
                'kategoriLomba' => 'Nasional',
                'kapasitas' => 5,
                'batasPendaftaran' => '2023-09-14',
                'penyelenggara' => 'TELKOM',
                'biaya' => '30000'
            ],
            [
                'idLomba' => '13',
                'namaLomba' => 'Dota 2 Esport',
                'kategoriLomba' => 'Nasional',
                'kapasitas' => 5,
                'batasPendaftaran' => '2023-10-19',
                'penyelenggara' => 'ITB',
                'biaya' => '90000'
            ],
            [
                'idLomba' => '14',
                'namaLomba' => 'CTF Undip',
                'kategoriLomba' => 'Nasional',
                'kapasitas' => 5,
                'batasPendaftaran' => '2023-08-12',
                'penyelenggara' => 'UNDIP',
                'biaya' => '30000'
            ],

        ]);
    }
}
