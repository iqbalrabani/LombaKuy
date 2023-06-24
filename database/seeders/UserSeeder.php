<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {

        // Menghapus data yang ada di tabel users
        DB::table('users')->truncate();

        // Memasukkan data menggunakan metode insert()
        DB::table('users')->insert([
            [
                'namePengguna' => 'A',
                'idPengguna' => '1',
                'password' => Hash::make('1'),
                'kategori' => 'Admin'
            ],
            [
                'namePengguna' => 'B',
                'idPengguna' => '2',
                'password' => Hash::make('1'),
                'kategori' => 'User'
            ],
            // Tambahkan data lain sesuai kebutuhan Anda
        ]);


    }
}
