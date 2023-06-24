<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_TimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_tims')->insert([
            [
                'idPengguna' => '1',
                'idTim' => '1'
            ],
            [
                'idPengguna' => '2',
                'idTim' => '2'
            ],
            // Tambahkan data lain sesuai kebutuhan Anda
        ]);
    }
}
