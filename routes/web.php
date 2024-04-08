<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketReplyController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tickets', [TicketController::class, 'index'])->middleware('auth')->name('ticket.index');
Route::get('/', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/ticket', [TicketController::class, 'store'])->name('ticket.store');
Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->middleware('auth')->name('ticket.show');
Route::post('/tickets/{ticket}/reply', [TicketReplyController::class, 'store'])->middleware('auth')->name('ticket.reply.store');



require __DIR__.'/auth.php';
