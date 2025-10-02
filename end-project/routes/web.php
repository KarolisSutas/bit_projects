<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\DonationController;
use App\Models\Story;
// use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Traits\HasRoles;



Auth::routes();

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/main/{story}', [MainController::class, 'show'])->name('main.show');
Route::post('/main/{story}/donations', [DonationController::class, 'store'])->name('donations.store');


Route::get('', fn() => to_route('main'));
Route::resource('stories', StoryController::class)->only(['index', 'show', 'create']);

Route::put('stories/{story}/toggle-approve', function (Story $story) {
    $story->toggleApprove();

    return back()->with('success', 'Story status updated!');
})->name('stories.toggle-approve');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'create')->name('login');          
    Route::post('/login', 'store')->name('auth.store');     

    Route::delete('/logout', [AuthController::class, 'destroy'])->name('logout');

    Route::get('/register', 'signup')->name('register');          
    Route::post('/register', 'register')->name('register.store'); 
});


Route::middleware('auth')->group(function () {
        Route::get('/story/create', [StoryController::class, 'create'])->name('stories.create');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('stories', StoryController::class);
});


    
