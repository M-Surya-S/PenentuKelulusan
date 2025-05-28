<?php

use App\Http\Controllers\KriteriaBobot;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('home');

Route::get('/kriteria-bobot', [KriteriaBobot::class, 'index'])->name('kriteria-bobot');
