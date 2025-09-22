<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Auth;
use App\Models\Story;



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/main', [MainController::class, 'index'])->name('main');

Route::get('', fn() => to_route('main'));
Route::resource('stories', StoryController::class)->only(['index', 'show']);

Route::put('stories/{story}/toggle-approve', function (Story $story) {
    $story->toggleApprove();

    return back()->with('success', 'Story status updated!');
})->name('stories.toggle-approve');
