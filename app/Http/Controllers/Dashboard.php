<?php

namespace App\Http\Controllers;

use App\Models\KriteriaBobot;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $kriteria = KriteriaBobot::count();
        $sub_kriteria = SubKriteria::count();

        return view('dashboard', compact('kriteria', 'sub_kriteria'));
    }
}
