<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ChecklistItemController;
use App\Http\Controllers\ReminderController;

Route::get('/', function () {
    return view('welcome');
});

// NOTES
Route::resource('/notes', NoteController::class);

// EVENTS
Route::resource('/events', EventController::class);

// CHECKLIST
Route::resource('/checklists', ChecklistController::class);
// CHECKLIST ITEM
Route::patch('/items/{item}/toggle', [ChecklistItemController::class, 'toggle'])->name('items.toggle');
Route::delete('/items/{item}', [ChecklistItemController::class, 'destroy'])->name('items.destroy');

// REMINDER
Route::resource('/reminders', ReminderController::class);

// BREEZE
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
