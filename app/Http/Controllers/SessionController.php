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
    function logout(){
        Auth::logout();
        return redirect('sesi')->withErrors('succes','Berhasil logout');
    }
    function register(){
        return view('sesi/register');
    }
    function create(Request $request){
        Session::flash('namePengguna', $request->namePengguna);
        Session::flash('idPengguna', $request->idPengguna);
        $request->validate([
            'namePengguna' =>'required',
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
            'namePengguna'=>$request->namePengguna,
            'idPengguna'=>$request->idPengguna,
            'password'=> Hash::make($request->password) ,
            'kategori'=>$request->kategori

        ];
        
        User::create($data);

        if (Auth::attempt($infologin)) {
            // Jika berhasil
            // Redirect ke halaman utama
            return redirect('/yourCompetition');
        } else {
            // Jika gagal
            // return 'Gagal';
        }
    }
}