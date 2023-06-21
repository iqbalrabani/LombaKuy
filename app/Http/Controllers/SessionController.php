<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view("sesi/index");
    }

    function login(Request $request)
    {
        Session::flash('idPengguna', $request->idPengguna);
        $request->validate([
            'idPengguna' => 'required',
            'password' => 'required'
        ], [
            'idPengguna.required' => 'idPengguna wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'idPengguna' => $request->idPengguna,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            // Jika berhasil
            // Redirect ke halaman utama
            return redirect('/yourCompetition');
        } else {
            // Jika gagal
            // return 'Gagal';
           return redirect()->back()->withErrors(['email' => 'Email atau password tidak valid.']);
        }
    }
}