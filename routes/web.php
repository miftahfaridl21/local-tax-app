<?php

use App\Http\Controllers\CetakOmsetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('cetak-laporan', [CetakOmsetController::class, 'cetaklaporan']);