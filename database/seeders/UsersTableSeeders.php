<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

  
class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // User::create([
        //     'namaPengguna'=>'Nathan',
        //     'idPengguna'=>'nathan777',
        //     'password'=>Hash::make('123456')
        // ]);
    }
}
