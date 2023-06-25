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
                'idTim' => '1',
                'namaMember' => 'Anggota A',
                'kedudukan' => 'Ketua'
            ],
            [
                'idTim' => '2',
                'namaMember' => 'Anggota B',
                'kedudukan' => 'Ketua'
            ],
            [
                'idTim' => '1',
                'namaMember' => 'Anggota C',
                'kedudukan' => 'Anggota'
            ],
            [
                'idTim' => '2',
                'namaMember' => 'Pembimbing D',
                'kedudukan' => 'Pembimbing'
            ]
            // Tambahkan data lain sesuai kebutuhan Anda
        ]);
    }
}
