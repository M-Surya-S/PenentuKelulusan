<?php

namespace App\Http\Controllers;

use App\Models\KriteriaBobot;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $kriteria = KriteriaBobot::findorfail($id);
        $sub_kriteria = SubKriteria::where('id_kriteria', $id)->get();

        return view('sub_kriteria.table', compact('kriteria', 'sub_kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $kriteria = KriteriaBobot::findorfail($id);

        return view('sub_kriteria.create', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        SubKriteria::create([
            'id_kriteria' => $id,
            'desc' => $request->deskripsi,
            'rate' => $request->bobot,
        ]);

        return redirect(route('sub-kriteria', $id))->with('success', 'Berhasil Menambahkan Sub Kriteria!');
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
        $sub_kriteria = SubKriteria::findOrfail($id);

        return view('sub_kriteria.edit', compact('sub_kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sub_kriteria = SubKriteria::findOrfail($id);

        $sub_kriteria->update([
            'desc' => $request->deskripsi,
            'rate' => $request->bobot,
        ]);

        return redirect(route('sub-kriteria', $sub_kriteria->id_kriteria))->with('success', 'Berhasil Mengubah Sub Kriteria!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SubKriteria::destroy($id);

        return back()->with('success', 'Berhasil Menghapus Sub Kriteria!');
    }
}
