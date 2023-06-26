<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tims')->insert([
            [
                'namaTim' => 'Tim A',
                'idPengguna' => '1'
            ],
            [
                'namaTim' => 'Tim B',
                'idPengguna' => '2'
            ],
            // Tambahkan data lain sesuai kebutuhan Anda
        ]);
    }
}
