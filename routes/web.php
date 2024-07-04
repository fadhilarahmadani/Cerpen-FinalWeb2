<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoryController;


Route::get('/read', function () {
    return view('user.read');
});
Route::get('/cat', function () {
    return view('user.category');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


// Route::middleware(['auth', 'is_admin'])->group(function () {
    // });
    // Route::get('/stories', [StoryController::class, 'index'])->name('stories.index');
    // Route::post('/stories/create', [StoryController::class, 'create'])->name('stories.store');
    // Route::resource('stories', StoryController::class);

    Route::get('/stories', [StoryController::class, 'index'])->name('admin.story');
    Route::get('/story/create', [StoryController::class, 'create'])->name('story.create');
    Route::post('/story/store', [StoryController::class, 'store'])->name('story.store');
    Route::get('/story/{id}', [StoryController::class, 'show'])->name('story.show');
    Route::get('/story/{id}/edit', [StoryController::class, 'edit'])->name('story.edit');
    Route::put('/story/{id}', [StoryController::class, 'update'])->name('story.update');
    Route::delete('/story/{id}', [StoryController::class, 'destroy'])->name('story.destroy');
    Route::get('/', [StoryController::class, 'user'])->name('user.story');
    Route::get('/search', [StoryController::class, 'search'])->name('search');