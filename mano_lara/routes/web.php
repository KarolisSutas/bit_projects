<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ColorController as C;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vardas', function () {
    return view('vardas');
});

Route::get('/vardas2', [C::class, 'showName']);

Route::get('/spalva/{color}', [C::class, 'showColor'])->name('spalva.show');

Route::get('/suma/{a}/{b}', [C::class, 'sumaFunkcija']);

// Route::get('/spalva', [C::class, 'randomColor'])->name('atsitiktine-spalva');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
