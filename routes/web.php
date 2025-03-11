<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\SmsController;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // Additional routes
    Route::get('dashboard', [ChatController::class,'dashboard'])->name('dashboard');
    Route::get('chatpanel/{number}', [ChatController::class,'chatPanel'])->name('chatpanel');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';




Route::get('/send-sms', [SmsController::class, 'sendSms']);
