<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Tim;
use App\Models\User;
use App\Models\Lomba;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;

class TimController extends Controller
{
    public function index()
    {
        $tims = Tim::all();

        return view('tim.index', compact('tims'));
    }

    public function detail()
    {
        $tims = Tim::all();
        $users = User::all();
        $lombas = Lomba::all();

        return view('tim.detail', compact('tims', 'users', 'lombas'));
    }

    public function buat()
    {
        $tims = Tim::all();
        $users = User::all();
        $lombas = Lomba::all();

        return view('tim.buatTim', compact('tims', 'users', 'lombas'));
    }

    public function edit()
    {
        $tims = Tim::all();

        return view('tim.edit', compact('tims'));
    }

    public function simpanAnggota(Request $request)
    {
        $namaMember = $request->input('namaMember');
        $kedudukan = $request->input('kedudukan');

        // Validasi data jika diperlukan

        // Simpan data anggota ke dalam database
        $member = new Member();
        $member->idTim = 1;
        $member->namaMember = $namaMember;
        $member->kedudukan = $kedudukan;
        $member->save();

        // Kirim respon sukses ke klien (JavaScript)
        return response()->json(['status' => 'success']);
    }

    public function tambahMember(Request $request, $idTim)
    {
        $idTim = 99;
        $validatedData = $request->validate([
            'namaMember' => 'required',
            'kedudukan' => 'required'
        ]);
        try {
            Member::create($validatedData, $idTim);
            return redirect()->route('tambahMember')
                ->with('success', 'Data dosen berhasil disimpan');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data dosen');
        }
    }
}
