<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


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

        $kategori = User::where('idPengguna', $infologin['idPengguna'])->value('kategori');

        if (Auth::attempt($infologin)) {
            // Jika berhasil
            // Redirect ke halaman utama
            if (strtolower($kategori) == 'user') {
                $namePengguna = Auth::user()->namePengguna;
                $idPengguna = Auth::user()->idPengguna;
                return redirect("/yourCompetition/$namePengguna/$idPengguna");
                // return redirect('/yourCompetition');
                // return view('/yourCompetition', compact('namePengguna'));
                // return redirect('/yourCompetition/JohnDoe');
                // return view('yourCompe', compact('namePengguna'));
                // return view('yourCompe', ['namePengguna' => $namePengguna]);
            } else {
                return redirect('/event');
            }
        } else {
            // Jika gagal
            // return 'Gagal';
            return redirect()->back()->withErrors(['email' => 'Email atau password tidak valid.']);
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('sesi')->withErrors('succes', 'Berhasil logout');
    }
    function register()
    {
        return view('sesi/register');
    }
    function create(Request $request)
    {
        Session::flash('namePengguna', $request->namePengguna);
        Session::flash('idPengguna', $request->idPengguna);
        $request->validate([
            'namePengguna' => 'required',
            'idPengguna' => 'required',
            'password' => 'required'
        ], [
            'namePengguna.required' => 'Nama Lengkap wajib diisi',
            'idPengguna.required' => 'idPengguna wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        $infologin = [
            'idPengguna' => $request->idPengguna,
            'password' => $request->password
        ];

        $data = [
            'namePengguna' => $request->namePengguna,
            'idPengguna' => $request->idPengguna,
            'password' => Hash::make($request->password),
            'kategori' => 'user'
        ];
        $idPengguna=$request->idPengguna;
        $password=($request->password);
        $repassword = ($request->repassword);
        $check = User::where('idPengguna',$idPengguna)->first();

        if($check){
            return redirect()->back()->withErrors(['error' => 'USERNAME TELAH DIGUNAKAN']);
        } else {
            if(strlen($password)>=6){
                if($password==$repassword){
                    User::create($data);
                } else {
                    return redirect()->back()->withErrors(['error' => 'PASSWORD YANG DIMASUKKAN TIDAK SAMA']);
                }

            } else {
                return redirect()->back()->withErrors(['error' => 'PASSWORD HARUS TERDIRI DARI 6 KARAKTER']);
            }
        }
        if (Auth::attempt($infologin)) {
            // Jika berhasil
            // Redirect ke halaman utama
            // return redirect('/yourCompetition');
            return redirect('/sesi');
        } else {
            // Jika gagal
            // return 'Gagal';
        }
    }
}
