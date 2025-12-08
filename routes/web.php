<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ChecklistItemController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\WishlistController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('notes.index');
    }
    return redirect()->route('register');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('notes.index');
    })->name('dashboard');

    // NOTES
    Route::resource('/notes', NoteController::class);

    // EVENTS
    Route::resource('/events', EventController::class);

    // CHECKLISTS
    Route::resource('/checklists', ChecklistController::class);
    // CHECKLIST ITEMS
    Route::patch('/items/{item}/toggle', [ChecklistItemController::class, 'toggle'])->name('items.toggle');
    Route::delete('/items/{item}', [ChecklistItemController::class, 'destroy'])->name('items.destroy');

    // REMINDERS
    Route::resource('/reminders', ReminderController::class);

    // WISHLIST
    Route::resource('/wishlists', WishlistController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';