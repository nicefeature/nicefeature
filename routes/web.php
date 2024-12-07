<?php

use App\Http\Controllers\Feedback\AdminFeedbackController;
use App\Http\Controllers\Feedback\Board\AdminBoardController;
use App\Http\Controllers\Feedback\Board\BoardDescriptionController;
use App\Http\Controllers\Feedback\Board\BoardOrderController;
use App\Http\Controllers\Feedback\Board\BoardSettingsController;
use App\Http\Controllers\Feedback\Board\BoardTitleController;
use App\Http\Controllers\Feedback\Board\BoardVisibilityController;
use App\Http\Controllers\Feedback\Board\EmojiController;
use App\Http\Controllers\Feedback\Board\PublicBoardController;
use App\Http\Controllers\Feedback\PublicFeedbackController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/**
 * PUBLIC ROUTES
 */
Route::get('/', [PublicFeedbackController::class, 'show'])
    ->name('feedback');

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

    Route::get('/admin', [AdminFeedbackController::class, 'show'])
        ->name('admin.feedback');

    Route::get('/admin/roadmap', function () {
        return Inertia::render('Roadmap/AdminRoadmap');
    })->name(name: 'admin.roadmap');

    Route::get('/admin/changelog', function () {
        return Inertia::render('Changelog/AdminChangelog');
    })->name('admin.changelog');

    Route::post('/admin/boards', [AdminBoardController::class, 'store'])
        ->name('admin.board.store');

    Route::get('/admin/boards/{id}', [AdminBoardController::class, 'show'])
        ->name('admin.board.show');

    Route::delete('/admin/boards/{id}', [AdminBoardController::class, 'delete'])
        ->name('admin.board.delete');

    Route::get('/admin/boards/{id}/settings', [BoardSettingsController::class, 'show'])
        ->name('admin.board.settings.show');

    Route::patch('/boards/{id}/emoji', [EmojiController::class, 'update'])
        ->name('admin.board.emoji.update');

    Route::patch('/boards/{id}/visibility', [BoardVisibilityController::class, 'update'])
        ->name('admin.board.visibility.update');

    Route::patch('/boards/{id}/title', [BoardTitleController::class, 'update'])
        ->name('admin.board.title.update');

    Route::patch('/boards/{id}/description', [BoardDescriptionController::class, 'update'])
        ->name('admin.board.description.update');

    Route::patch('/boards/order', [BoardOrderController::class, 'update'])
        ->name('admin.board.order.update');
});

/**
 * AUTH
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/feedback', [PublicFeedbackController::class, 'store'])
        ->name('feedback.store');
});

require __DIR__.'/auth.php';
