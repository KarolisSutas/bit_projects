<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;



Auth::routes();

Route::resource('jobs', JobController::class)->only(['index']);