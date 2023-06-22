<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;

class RingkasanController extends Controller
{
    public function show($id)
    {
        // Cari lomba berdasarkan ID
        $lomba = Lomba::find($id);

        // Jika lomba ditemukan, tampilkan view ringkasan dengan data lomba
        if ($lomba) {
            return view('ringkasan')->with('lomba', $lomba);
        }

        // Jika lomba tidak ditemukan, tampilkan pesan error
        return back()->withErrors('Data lomba tidak ditemukan.');
    }
}