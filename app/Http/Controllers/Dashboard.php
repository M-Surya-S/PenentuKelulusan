<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\KriteriaBobot;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $kriteria_bobot = KriteriaBobot::all();
        $jumlah_kriteria = $kriteria_bobot->count();
        $jumlah_sub_kriteria = SubKriteria::count();
        $alternatif = Alternatif::count();

        return view('dashboard', compact('kriteria_bobot', 'jumlah_kriteria', 'jumlah_sub_kriteria', 'alternatif'));
    }
}
