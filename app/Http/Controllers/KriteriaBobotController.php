<?php

namespace App\Http\Controllers;

use App\Models\KriteriaBobot;
use Illuminate\Http\Request;

class KriteriaBobotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteria_bobot = KriteriaBobot::all();
        $total_bobot = KriteriaBobot::sum('bobot');
        
        return view('kriteria_bobot.table', compact('kriteria_bobot', 'total_bobot'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kriteria_bobot.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        KriteriaBobot::create([
            'kriteria' => $request->kriteria,
            'bobot' => $request->bobot,
            'tipe' => $request->tipe,
        ]);

        return redirect(route('kriteria-bobot'))->with('success', 'Berhasil Menambahkan Kriteria!');
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
        $kriteria_bobot = KriteriaBobot::findorfail($id);
        return view('kriteria_bobot.edit', compact('kriteria_bobot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kriteria_bobot = KriteriaBobot::findorfail($id);

        $kriteria_bobot->update([
            'kriteria' => $request->kriteria,
            'bobot' => $request->bobot,
            'tipe' => $request->tipe,
        ]);

        return redirect(route('kriteria-bobot'))->with('success', 'Berhasil Mengubah Kriteria!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KriteriaBobot::destroy($id);

        return redirect(route('kriteria-bobot'))->with('success', 'Berhasil Menghapus Kriteria!');
    }
}
