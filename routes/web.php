<?php

use App\Http\Controllers\Feedback\Board\AdminBoardController;
use App\Http\Controllers\Feedback\Board\EmojiController;
use App\Http\Controllers\Feedback\Board\PublicBoardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/**
 * PUBLIC ROUTES
 */
Route::get('/', function () {
    return Inertia::render('Feedback/PublicFeedback');
})->name('feedback');

Route::get('/roadmap', function () {
    return Inertia::render('Roadmap/PublicRoadmap');
})->name('roadmap');

Route::get('/changelog', function () {
    return Inertia::render('Changelog/PublicChangelog');
})->name('changelog');

Route::get('/b/{id}', [PublicBoardController::class, 'show'])
    ->name('board.show');

/**
 * AUTH & VERIFIED
 */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', function () {
        return Inertia::render('Feedback/AdminFeedback');
    })->name('admin.feedback');

    Route::get('/admin/roadmap', function () {
        return Inertia::render('Roadmap/AdminRoadmap');
    })->name(name: 'admin.roadmap');

    Route::get('/admin/changelog', function () {
        return Inertia::render('Changelog/AdminChangelog');
    })->name('admin.changelog');

    Route::get('/admin/boards/{id}', [AdminBoardController::class, 'show'])
        ->name('admin.board.show');

    Route::post('/admin/boards', [AdminBoardController::class, 'store'])
        ->name('admin.board.store');

    Route::patch('/boards/{id}/emoji', [EmojiController::class, 'update'])
        ->name('admin.board.emoji.update');
});

/**
 * AUTH
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
