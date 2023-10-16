<?php

use App\Http\Controllers\PublicationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Models\Publication;
use App\Models\Like;
use Illuminate\Support\Facades\Route;


Route::get('/', [PublicationController::class, 'index'])->name('welcome')->middleware('auth');

Route::get('/events/publication', [PublicationController::class, 'create'])->name('publications.create');
Route::post('/events/publication/create', [PublicationController::class, 'store']);
Route::delete('/publications/{publication}', [PublicationController::class, 'destroy'])->name('publications.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/like/{publication}', [LikeController::class, 'likePublication']);
Route::delete('/unlike/{publication}', [LikeController::class, 'unlikePublication']);


Route::get('/publications/{publication}/comments', [CommentController::class, 'create'])->name('comments.create');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
