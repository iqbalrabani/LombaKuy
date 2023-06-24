<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User_LombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_lombas')->insert([
            [
                'idLomba' => '123',
                'idPengguna' => '1'
            ],
            [
                'idLomba' => '123',
                'idPengguna' => '2'
            ],
            // Tambahkan data lain sesuai kebutuhan Anda
        ]);
    }
}
