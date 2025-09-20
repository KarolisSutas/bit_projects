<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Auth;



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/main', [MainController::class, 'index'])->name('main');

Route::get('', fn() => to_route('main'));
Route::resource('stories', StoryController::class)->only(['index', 'show']);
