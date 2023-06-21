<?php

namespace App\Http\Controllers;

use App\Models\Tim;
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
    
        return view('tim.detail', compact('tims'));
    }
}
