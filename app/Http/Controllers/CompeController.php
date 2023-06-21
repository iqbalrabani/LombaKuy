<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
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
        if($lomba) {
            return view('yourCompe', ['lombas' => $lomba]);
        }
        return "Not Found";
    }

    public function listLomba()
    {
        $lomba = Lomba::all();
        if($lomba) {
            return view('listLomba', ['lombas' => $lomba]);
        }
        return "Not Found";
    }

    
}
