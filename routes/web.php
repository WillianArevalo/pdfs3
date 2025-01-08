<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DteController;


Route::post('/generar_pdf', [DteController::class, 'generate_pdf'])->name('pdf.text');
Route::get("/", function () {
    return view("ticket");
});
