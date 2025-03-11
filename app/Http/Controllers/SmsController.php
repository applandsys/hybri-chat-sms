<?php

namespace App\Http\Controllers;

use App\Services\SignalWireService;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    protected $signalWireService;

    public function __construct(SignalWireService $signalWireService)
    {
        $this->signalWireService = $signalWireService;
    }

    public function sendSms(Request $request)
    {
        /*
        $request->validate([
            'to' => 'required|string',
            'message' => 'required|string',
        ]);

        */

        // Send SMS using the SignalWire service
      //  $response = $this->signalWireService->sendSms($request->to, $request->message);
        $response = $this->signalWireService->sendSms('+15189946888', 'Hello thsi is a test message');

        return response()->json($response);
    }
}
