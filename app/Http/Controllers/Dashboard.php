<?php

namespace App\Http\Controllers;

use App\Models\kriteria_bobot;
use App\Models\sub_kriteria;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $kriteria = kriteria_bobot::count();
        $sub_kriteria = sub_kriteria::count();

        return view('dashboard', compact('kriteria', 'sub_kriteria'));
    }
}
