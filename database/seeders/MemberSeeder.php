<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            [
                'idPengguna' => '1',
                'namaMember' => 'Anggota A'
            ],
            [
                'idPengguna' => '2',
                'namaMember' => 'Anggota B'
            ],
            // Tambahkan data lain sesuai kebutuhan Anda
        ]);
    }
}
