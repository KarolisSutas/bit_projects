<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;



Auth::routes();

Route::get('', fn() => to_route('jobs.index'));
Route::resource('jobs', JobController::class)->only(['index', 'show']);
