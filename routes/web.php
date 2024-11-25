<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/**
 * PUBLIC ROUTES
 */
Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

Route::get('/feedback', function () {
    return Inertia::render('Feedback/PublicFeedback');
})->name('feedback');

Route::get('/roadmap', function () {
    return Inertia::render('Roadmap/PublicRoadmap');
})->name('roadmap');

Route::get('/changelog', function () {
    return Inertia::render('Changelog/PublicChangelog');
})->name('changelog');

/**
 * AUTH & VERIFIED
 */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', function () {
        return Inertia::render('AdminPanel');
    })->name('admin');

    Route::get('/admin/feedback', function () {
        return Inertia::render('Feedback/AdminFeedback');
    })->name('admin/feedback');

    Route::get('/admin/roadmap', function () {
        return Inertia::render('Roadmap/AdminRoadmap');
    })->name(name: 'admin/roadmap');

    Route::get('/admin/changelog', function () {
        return Inertia::render('Changelog/AdminChangelog');
    })->name('admin/changelog');
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
