<?php

namespace App\Http\Controllers;

use App\Services\SignalWireService;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class SmsController extends Controller
{
    protected $signalWireService;

    protected $client;

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
        $response = $this->signalWireService->sendSms('+15189946888', 'Hello noyan bhai my website is https://t.co/1mfACWTBTg');

        return response()->json($response);
    }


    public function getCallerId(){
        $response = $this->signalWireService->requestCallerId();
        return response()->json($response);
    }

}
