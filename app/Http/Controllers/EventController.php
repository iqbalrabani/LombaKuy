<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use Illuminate\Http\Request;

class EventController extends Controller
{
    function index() {
        $lombas = Lomba::all();
        return view("event.index", compact('lombas'));
    }

    public function addLomba(Request $request)
    {
        // Validasi data input
        $request->validate([
            'idLomba' => 'required',
            'namaLomba' => 'required',
            'kategoriLomba' => 'required',
            'kapasitas' => 'required',
            'batasPendaftaran' => 'required|date',
            'penyelenggara' => 'required',
            'biaya' => 'required',
        ]);

        // Simpan data lomba ke dalam database
        Lomba::create([
            'idLomba' => $request->idLomba,
            'namaLomba' => $request->namaLomba,
            'kategoriLomba' => $request->kategoriLomba,
            'kapasitas' => $request->kapasitas,
            'batasPendaftaran' => $request->batasPendaftaran,
            'penyelenggara' => $request->penyelenggara,
            'biaya' => $request->biaya,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect('/event')->with('success', 'Lomba berhasil ditambahkan.');
    }

    public function editPage($idLomba)
    {
        $lomba = Lomba::where('idLomba', $idLomba)->first();
        return view("event.edit", compact('lomba'));
    }

    public function editLomba(Request $request, $idLomba)
    {
        $lomba = Lomba::where('idLomba', $idLomba);
        
        // Validate the request data
        $data = $request->validate([
            'idLomba' => 'required',
            'namaLomba' => 'required',
            'kategoriLomba' => 'required',
            'kapasitas' => 'required',
            'batasPendaftaran' => 'required|date',
            'penyelenggara' => 'required',
            'biaya' => 'required',
        ]);

        // Update the Lomba instance with the new values
        // $lomba->idLomba = $request->idLomba;
        // $lomba->namaLomba = $request->namaLomba;
        // $lomba->kategoriLomba = $request->kategoriLomba;
        // $lomba->kapasitas = $request->kapasitas;
        // $lomba->batasPendaftaran = $request->batasPendaftaran;
        // $lomba->penyelenggara = $request->penyelenggara;
        // $lomba->biaya = $request->biaya;

        // Save the updated Lomba instance
        $lomba->update($data);

        // Redirect the user to the desired page with a success message
        return redirect('/event')->with('success', 'Lomba berhasil diperbarui.');
    }


    function deleteLomba($idLomba) {
        $lomba = Lomba::where('idLomba', $idLomba);
        $lomba->delete();
        return redirect('/event')->with('success', 'Lomba berhasil dihapus.');
    }
}
