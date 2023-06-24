<?php

namespace App\Http\Controllers;

use App\Models\Tim;
use App\Models\User;
use App\Models\Lomba;
use Illuminate\Http\Request;

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
}
