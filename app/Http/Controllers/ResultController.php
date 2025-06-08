<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\KriteriaBobot;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function matrix()
    {
        $alternatif = Alternatif::with(['skor_alternatif.kriteria', 'skor_alternatif.sub_kriteria'])->get();
        $kriteria = KriteriaBobot::all();
        $jumlah_kriteria = $kriteria->count();

        // Hitung S_i untuk setiap alternatif
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

        // Hitung total semua S_i
        $total_s = array_sum($vektor_s);

        // Hitung V_i = S_i / total S
        $vektor_v = [];
        foreach ($vektor_s as $id => $s) {
            $vektor_v[$id] = $s / $total_s;
        }

        return view('result.matrix', compact('alternatif', 'kriteria', 'jumlah_kriteria', 'vektor_v', 'vektor_s'));
    }

    public function ranking()
    {
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

        return view('result.ranking', [
            'alternatif' => $sorted_alternatif,
            'vektor_v' => $vektor_v,
        ]);
    }
}
