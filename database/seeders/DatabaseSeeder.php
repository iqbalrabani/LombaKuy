<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeders;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\table;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'namePengguna'=>'Nathan',
            'idPengguna'=>'nathan777',
            'password'=>Hash::make('123456'),
            'kategori'=>'user'
        ]);

        DB::table('lombas')->insert([
            'idLomba'=>'123',
            'namaLomba'=>'Lomba PKM',
            'kategoriLomba'=>'DIKTI',
            'kapasitas'=> 3,
            'batasPendaftaran'=>'2023-06-22',
            'penyelenggara'=>'UB',
            'biaya'=>'100000'
        ]);
    }
}
