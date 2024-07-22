<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\SubscriptionController;




Route::get('/cat', function () {
    return view('user.category');
});
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::middleware(['auth', 'is_admin'])->group(function (){
    Route::get('/stories', [StoryController::class, 'index'])->name('admin.story');
    Route::get('/story/create', [StoryController::class, 'create'])->name('story.create');
    Route::post('/story/store', [StoryController::class, 'store'])->name('story.store');
    Route::get('/story/{id}', [StoryController::class, 'show'])->name('story.show');
    Route::get('/story/{id}/edit', [StoryController::class, 'edit'])->name('story.edit');
    Route::put('/story/{id}', [StoryController::class, 'update'])->name('story.update');
    Route::delete('/story/{id}', [StoryController::class, 'destroy'])->name('story.destroy');
});


Route::get('/stories/{id}', [StoryController::class, 'showCategoryStories']);
Route::get('/', [StoryController::class, 'user'])->name('user.story');
Route::get('/search', [StoryController::class, 'search'])->name('search');
Route::get('/search/admin', [StoryController::class, 'searchAdmin'])->name('search.admin');


// Route::middleware(['session'])->group(function () {
    Route::get('/subscription', [SubscriptionController::class, 'show'])->name('subscription.form');
    Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
    // });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/read/{id}', [StoryController::class, 'read'])->name('user.read');
    });