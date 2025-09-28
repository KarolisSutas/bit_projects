<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StoryController;
use App\Models\Story;



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/main', [MainController::class, 'index'])->name('main');
Route::get('/show/{id}', [MainController::class, 'show'])->name('show');

Route::get('', fn() => to_route('main'));
Route::resource('stories', StoryController::class)->only(['index', 'show', 'create']);

Route::put('stories/{story}/toggle-approve', function (Story $story) {
    $story->toggleApprove();

    return back()->with('success', 'Story status updated!');
})->name('stories.toggle-approve');

Route::get('login', fn() => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)
->only(['create', 'store']);
Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])
    ->name('auth.destroy');

Route::middleware('auth')->group(function () {
        Route::get('/story/create', [StoryController::class, 'create'])->name('stories.create');
        Route::post('/stories', [StoryController::class, 'store'])->name('stories.store');
});
    
