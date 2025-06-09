<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\KriteriaBobot;
use App\Models\SkorAlternatif;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatif = Alternatif::with(['skor_alternatif.kriteria', 'skor_alternatif.sub_kriteria'])->get();
        $kriteria = KriteriaBobot::all();
        $jumlah_kriteria = $kriteria->count();

        foreach ($alternatif as $a) {
            $status = 'Lulus';

            foreach ($kriteria as $k) {
                $skor = $a->skor_alternatif->firstWhere('id_kriteria', $k->id);
                $rate = $skor->sub_kriteria->rate ?? 0;

                if (strtolower($k->kriteria) === 'kehadiran') {
                    if ($rate < 3) {
                        $status = 'Tidak Lulus';
                        break;
                    }
                } else {
                    if ($rate < 2) {
                        $status = 'Tidak Lulus';
                        break;
                    }
                }
            }

            $a->status = $status;
        }

        return view('alternatif.table', compact('alternatif', 'kriteria', 'jumlah_kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriteria = KriteriaBobot::all();
        $sub_kriteria = SubKriteria::all();

        return view('alternatif.create', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $alternatif = Alternatif::create([
            'name' => $request->name,
        ]);

        foreach ($request->tipe as $id_kriteria => $id_sub_kriteria) {
            SkorAlternatif::create([
                'id_alternatif' => $alternatif->id,
                'id_kriteria' => $id_kriteria,
                'id_sub_kriteria' => $id_sub_kriteria,
            ]);
        }

        return redirect(route('alternatif'))->with('success', 'Berhasil Menambahkan Alternatif!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alternatif = Alternatif::findOrFail($id);
        $kriteria = KriteriaBobot::all();

        return view('alternatif.edit', compact('alternatif', 'kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $alternatif = Alternatif::findOrFail($id);

        $alternatif->update([
            'name' => $request->name,
        ]);

        foreach ($request->tipe as $id_kriteria => $id_sub_kriteria) {
            $skor_alternatif = SkorAlternatif::where('id_alternatif', $alternatif->id)
                ->where('id_kriteria', $id_kriteria)
                ->first();

            if ($skor_alternatif) {
                $skor_alternatif->update([
                    'id_sub_kriteria' => $id_sub_kriteria
                ]);
            }
        }

        return redirect(route('alternatif'))->with('success', 'Berhasil Mengubah Alternatif!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Alternatif::destroy($id);

        return redirect()->back()->with('success', 'Berhasil Menghapus Alternatif!');
    }
}
