<?php

use App\Http\Controllers\PengunjungController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PengunjungController::class, 'index']);

Route::post('/pengunjung/store', [PengunjungController::class, 'store'])->name('pengunjung.store');
