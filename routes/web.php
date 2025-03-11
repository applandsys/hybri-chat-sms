<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('signalTest', function(){

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://<your-space>.signalwire.com/api/laml/2010-04-01/Accounts/<your-account-sid>/Messages.json',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Accept: application/json',
            'Authorization: Basic <your-api-key>'  // Replace with your SignalWire API Key
        ),
        CURLOPT_POSTFIELDS => http_build_query(array(
            'To' => '+1234567890',  // Replace with recipient's phone number
            'From' => '+1987654321',  // Replace with your SignalWire number
            'Body' => 'Hello, this is a test message!',  // Replace with your message content
            'MediaUrl' => 'https://www.example.com/image.jpg'  // Optional: replace with the media URL if you want to send media
        ))
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    echo $response;
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://pixma-agency.signalwire.com/api/laml/2010-04-01/Accounts/57c16a5a-6ca7-4625-9cce-a048a5093761/Messages.json',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Accept: application/json',
            'Authorization: Basic PSK_G5PqS9eSCYDpTYpGeLAocwgn'  // Replace with your SignalWire API Key
        ),
        CURLOPT_POSTFIELDS => http_build_query(array(
            'To' => '+15189946888',  // Replace with recipient's phone number
            'From' => '+2095937999',  // Replace with your SignalWire number
            'Body' => 'Hello, this is a test message!',  // Replace with your message content
            'MediaUrl' => 'https://www.example.com/image.jpg'  // Optional: replace with the media URL if you want to send media
        ))
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    echo $response;


});
