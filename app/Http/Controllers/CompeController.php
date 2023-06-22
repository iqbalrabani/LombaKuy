<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\user_lomba;
use Illuminate\Http\Request;

class CompeController extends Controller
{
    public function testing()
    {
        return view('yourCompetition');
    }

    public function showCompe()
    {
        $lomba = Lomba::all();
        $user_lomba = user_lomba::all();
        if ($lomba) {
            return view('yourCompe', ['lombas' => $lomba, 'user_lombas' => $user_lomba]);
        }
        return "Not Found";
    }

    public function listLomba()
    {
        $lomba = Lomba::all();
        if ($lomba) {
            return view('listLomba', ['lombas' => $lomba]);
        }
        return "Not Found";
    }

    public function applyLomba(Request $request)
    {
        $idLomba = $request->input('idLomba');
        $idPengguna = $request->input('idPengguna');

        User_Lomba::create([
            'idLomba' => $idLomba,
            'idPengguna' => $idPengguna
        ]);

        return redirect()->route('buat-tim');
    }

    public function deleteLomba2(Request $request)
    {
        $idLomba = $request->input('idLomba');
        $idPengguna = $request->input('idPengguna');

        User_Lomba::where('idLomba', $idLomba)
            ->where('idPengguna', $idPengguna)
            ->delete();

        return redirect()->route('your-competitions');
    }

    function deleteLomba($idLomba) {
        $lomba = User_Lomba::where('idLomba', $idLomba);
        $lomba->delete();
        return redirect()->route('your-competitions');
    }
}
