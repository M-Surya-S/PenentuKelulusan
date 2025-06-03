<?php

namespace App\Http\Controllers;

use App\Models\kriteria_bobot;
use Illuminate\Http\Request;

class KriteriaBobot extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteria_bobot = kriteria_bobot::all();
        $total_bobot = kriteria_bobot::sum('bobot');
        
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
        kriteria_bobot::create([
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
        $kriteria_bobot = kriteria_bobot::findorfail($id);
        return view('kriteria_bobot.edit', compact('kriteria_bobot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kriteria_bobot = kriteria_bobot::findorfail($id);

        $kriteria_bobot->update([
            'kriteria' => $request->kriteria,
            'bobot' => $request->bobot,
            'tipe' => $request->tipe,
        ]);

        return redirect(route('kriteria-bobot'))->with('success', 'Kriteria dan Bobot Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        kriteria_bobot::destroy($id);

        return redirect(route('kriteria-bobot'))->with('success', 'Kriteria dan Bobot Berhasil Dihapus!');
    }
}
