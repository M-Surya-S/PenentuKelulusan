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
        $jumlah_alternatif = Alternatif::count();

        $alternatif = Alternatif::with(['skor_alternatif.kriteria', 'skor_alternatif.sub_kriteria'])->get();
        $kriteria = KriteriaBobot::all();

        $vektor_s = [];
        foreach ($alternatif as $a) {
            $nilai_s = 1;

            foreach ($kriteria as $k) {
                $skor = $a->skor_alternatif->firstWhere('id_kriteria', $k->id);
                $rate = $skor->sub_kriteria->rate;

                $nilai_s *= pow($rate, ($k->bobot / $kriteria->sum('bobot')));
            }

            $vektor_s[$a->id] = $nilai_s;
        }

        $total_s = array_sum($vektor_s);

        $vektor_v = [];
        foreach ($vektor_s as $id => $s) {
            $vektor_v[$id] = $s / $total_s;
        }

        arsort($vektor_v);

        $sorted_alternatif = collect($vektor_v)->keys()->map(function ($id) use ($alternatif) {
            return $alternatif->firstWhere('id', $id);
        });

        return view('dashboard', compact('kriteria_bobot', 'jumlah_kriteria', 'jumlah_sub_kriteria', 'jumlah_alternatif', 'sorted_alternatif', 'vektor_v'));
    }
}
