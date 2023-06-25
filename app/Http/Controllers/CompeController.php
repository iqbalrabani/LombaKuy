<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\user_lomba;
use Illuminate\Http\Request;

class CompeController extends Controller
{
    public function testing($name)
    {
        // return view('testingRandom');
        return view('testingRandom', ['name' => $name]);
        // return redirect('/testingRandom/$name');
    }

    public function showCompe($namePengguna)
    {
        $lomba = Lomba::all();
        $user_lomba = user_lomba::all();
        if ($lomba) {
            return view('yourCompe', ['lombas' => $lomba, 'user_lombas' => $user_lomba, 'namePengguna' => $namePengguna]);
        }
        return "Not Found";
    }

    public function showCompe2($namePengguna, $idPengguna)
    {
        $lomba = Lomba::all();
        $user_lomba = user_lomba::all();
        if ($lomba) {
            return view('yourCompe', ['lombas' => $lomba, 'user_lombas' => $user_lomba, 'namePengguna' => $namePengguna, 'idPen' => $idPengguna]);
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

    public function listLomba2($idPengguna)
    {
        $lomba = Lomba::all();
        if ($lomba) {
            return view('listLomba', ['lombas' => $lomba, 'idPen' => $idPengguna]);
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

    public function applyLomba2($idPengguna, $idLomba)
    {
        User_Lomba::create([
            'idLomba' => $idLomba,
            'idPengguna' => $idPengguna
        ]);

        return redirect()->route('buat-tim');
    }

    function deleteLomba($idLomba)
    {
        $lomba = User_Lomba::where('idLomba', $idLomba);
        $lomba->delete();
        return redirect()->route('your-competitions');
    }

    function deleteLomba2($idLomba, $namePengguna, $idPengguna)
    {
        $lomba = User_Lomba::where('idLomba', $idLomba);
        $lomba->delete();
        return redirect("/yourCompetition/$namePengguna/$idPengguna");
    }


    
}
