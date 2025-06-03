<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\KriteriaBobot;
use App\Http\Controllers\SubKriteria;
use Illuminate\Support\Facades\Route;

Route::get('/', [Dashboard::class, 'index'])->name('home');

# Kriteria
Route::get('/kriteria-bobot', [KriteriaBobot::class, 'index'])->name('kriteria-bobot');
Route::get('/kriteria-bobot/add', [KriteriaBobot::class, 'create'])->name('add-kriteria-bobot');
Route::post('/kriteria-bobot/save', [KriteriaBobot::class, 'store'])->name('save-kriteria-bobot');
Route::get('/kriteria-bobot/{id}/edit', [KriteriaBobot::class, 'edit'])->name('edit-kriteria-bobot');
Route::put('/kriteria-bobot/{id}/update', [KriteriaBobot::class, 'update'])->name('update-kriteria-bobot');
Route::delete('/kriteria-bobot/{id}/delete', [KriteriaBobot::class, 'destroy'])->name('delete-kriteria-bobot');

# Sub Kriteria
Route::get('/kriteria-bobot/sub-kriteria/{id}', [SubKriteria::class, 'index'])->name('sub-kriteria');
Route::get('/kriteria-bobot/sub-kriteria/{id}/add', [SubKriteria::class, 'create'])->name('add-sub-kriteria');
Route::post('/kriteria-bobot/sub-kriteria/{id}/save', [SubKriteria::class, 'store'])->name('save-sub-kriteria');
Route::get('/kriteria-bobot/sub-kriteria/{id}/edit', [SubKriteria::class, 'edit'])->name('edit-sub-kriteria');
Route::put('/kriteria-bobot/sub-kriteria/{id}/update', [SubKriteria::class, 'update'])->name('update-sub-kriteria');
Route::delete('/kriteria-bobot/sub-kriteria/{id}/delete', [SubKriteria::class, 'destroy'])->name('delete-sub-kriteria');

# Alternatif
