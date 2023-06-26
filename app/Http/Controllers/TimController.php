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
        $members = Member::all();

        return view('tim.detail', compact('tims', 'users', 'lombas', 'members'));
    }

    public function buat($idPengguna)
    {

        $members = Member::all();
        $tims = Tim::all();
        $users = User::all();
        $lombas = Lomba::all();

        return view('tim.buatTim', compact('members', 'tims', 'users', 'lombas', 'idPengguna'));
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

    public function showAddMemberForm()
    {
        // Menampilkan form tambah anggota
        return view('tim.add-member-form');
    }


    public function simpanTim(Request $request)
    {
        // Validasi input
        $request->validate([
            'namaTim' => 'required'
        ]);

        // Ambil data yang dikirim melalui form
        $namaTim = $request->input('namaTim');
        $users = User::all();
        $user = $users->where('idPengguna', 1)->first();
        $idPengguna = $user->idPengguna;
        $namePengguna = $user->namePengguna;

        // Buat objek tim baru
        $tim = new Tim();
        $tim->namaTim = $namaTim;
        $tim->idPengguna = $idPengguna;

        // Simpan tim ke database
        $tim->save();

        // Redirect ke halaman yourCompe dengan membawa nilai idPengguna dan idTim
        return redirect()->route('yourCompetition', ['namePengguna' => $namePengguna, 'idPengguna' => $idPengguna]);
    }
    public function kembali()
    {
        $users = User::all();
        $user = $users->where('idPengguna', 1)->first();
        $idPengguna = $user->idPengguna;
        $namePengguna = $user->namePengguna;

        // Redirect ke halaman yourCompe dengan membawa nilai idPengguna dan idTim
        return redirect()->route('yourCompetition', ['namePengguna' => $namePengguna, 'idPengguna' => $idPengguna]);
    }

    public function addMember(Request $request)
    {
        $member = new Member();
        $member->idTim = 1; // Ubah sesuai dengan ID tim yang sesuai
        $member->namaMember = $request->input('nama');
        $member->kedudukan = $request->input('kedudukan');
        $member->save();

        return redirect()->back();
    }

    public function yourCompe($namePengguna, $idPengguna)
    {
        $users = User::all();
        $user = $users->where('id', 1)->first();
        $idPengguna = $user->idPengguna;
        $namePengguna = $user->namePengguna;

        return view('yourCompe', ['namePengguna' => $namePengguna, 'idPengguna' => $idPengguna]);
    }

    public function buatTim($idTim)
    {
        return view('buatTim', compact('idTim'));
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
