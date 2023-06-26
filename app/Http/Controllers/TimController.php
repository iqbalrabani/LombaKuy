<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Tim;
use App\Models\User;
use App\Models\Lomba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

        $members = Member::all();
        $tims = Tim::all();
        $users = User::all();
        $lombas = Lomba::all();

        return view('tim.buatTim', compact('members', 'tims', 'users', 'lombas'));
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

    public function tambahMember(Request $request)
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

        // Redirect kembali ke halaman yang sama
        return redirect()->back();
    }


    public function resetForm()
    {
        // Hapus semua data tim dan anggotanya dari database
        Member::truncate(); // Menghapus semua data pada tabel members
        Tim::truncate(); // Menghapus semua data pada tabel tims

        // Redirect kembali ke halaman yang sama
        return redirect()->back();
    }

    public function simpanTim()
    {
        // Ambil data yang dikirim melalui form
        $namaTim = request('namaTim');

        // Buat objek tim baru
        $tim = new Tim();
        $tim->namaTim = $namaTim;

        // Simpan tim ke database   
        $tim->save();

        // Redirect ke halaman index
        return redirect()->route('yourCompe');
    }

    public function showMember()
    {
        $tims = Member::all();

        return view('tim.buatTim', compact('members'));
    }

    public function deleteMember($namaMember)
    {
        try {
            $deleted = Member::where('namaMember', $namaMember)->delete();
            if ($deleted) {
                return Redirect::back()->with('success', 'Data member tim berhasil dihapus');
            } else {
                return Redirect::back()->with('error', 'Member dengan nama tersebut tidak ditemukan');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data member tim');
        }
    }



    public function delete($namaMember)
    {
        return view('tim.buatTim', ['namaMember' => $namaMember]);
    }
}
