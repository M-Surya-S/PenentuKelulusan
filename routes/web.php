<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\KriteriaBobotController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SubKriteriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Dashboard::class, 'index'])->name('home');

# Kriteria
Route::get('/kriteria-bobot', [KriteriaBobotController::class, 'index'])->name('kriteria-bobot');
Route::get('/kriteria-bobot/add', [KriteriaBobotController::class, 'create'])->name('add-kriteria-bobot');
Route::post('/kriteria-bobot/save', [KriteriaBobotController::class, 'store'])->name('save-kriteria-bobot');
Route::get('/kriteria-bobot/{id}/edit', [KriteriaBobotController::class, 'edit'])->name('edit-kriteria-bobot');
Route::put('/kriteria-bobot/{id}/update', [KriteriaBobotController::class, 'update'])->name('update-kriteria-bobot');
Route::delete('/kriteria-bobot/{id}/delete', [KriteriaBobotController::class, 'destroy'])->name('delete-kriteria-bobot');

# Sub Kriteria
Route::get('/kriteria-bobot/sub-kriteria/{id}', [SubKriteriaController::class, 'index'])->name('sub-kriteria');
Route::get('/kriteria-bobot/sub-kriteria/{id}/add', [SubKriteriaController::class, 'create'])->name('add-sub-kriteria');
Route::post('/kriteria-bobot/sub-kriteria/{id}/save', [SubKriteriaController::class, 'store'])->name('save-sub-kriteria');
Route::get('/kriteria-bobot/sub-kriteria/{id}/edit', [SubKriteriaController::class, 'edit'])->name('edit-sub-kriteria');
Route::put('/kriteria-bobot/sub-kriteria/{id}/update', [SubKriteriaController::class, 'update'])->name('update-sub-kriteria');
Route::delete('/kriteria-bobot/sub-kriteria/{id}/delete', [SubKriteriaController::class, 'destroy'])->name('delete-sub-kriteria');

# Alternatif
Route::get('/alternatif', [AlternatifController::class, 'index'])->name('alternatif');
Route::get('/alternatif/add', [AlternatifController::class, 'create'])->name('add-alternatif');
Route::post('/alternatif/save', [AlternatifController::class, 'store'])->name('save-alternatif');
Route::get('/alternatif/{id}/edit', [AlternatifController::class, 'edit'])->name('edit-alternatif');
Route::put('/alternatif/{id}/update', [AlternatifController::class, 'update'])->name('update-alternatif');
Route::delete('/alternatif/{id}/delete', [AlternatifController::class, 'destroy'])->name('delete-alternatif');

# Table Matrix
Route::get('/matrix', [ResultController::class, 'matrix'])->name('matrix');
Route::get('/ranking', [ResultController::class, 'ranking'])->name('ranking');