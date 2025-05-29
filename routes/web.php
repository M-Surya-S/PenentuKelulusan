<?php

use App\Http\Controllers\KriteriaBobot;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::get('/kriteria-bobot', [KriteriaBobot::class, 'index'])->name('kriteria-bobot');
Route::get('/kriteria-bobot/add', [KriteriaBobot::class, 'create'])->name('add-kriteria-bobot');
Route::post('/kriteria-bobot/save', [KriteriaBobot::class, 'store'])->name('save-kriteria-bobot');
Route::get('/kriteria-bobot/{id}/edit', [KriteriaBobot::class, 'edit'])->name('edit-kriteria-bobot');
Route::put('/kriteria-bobot/{id}/update', [KriteriaBobot::class, 'update'])->name('update-kriteria-bobot');
Route::delete('/kriteria-bobot/{id}/delete', [KriteriaBobot::class, 'destroy'])->name('delete-kriteria-bobot');
