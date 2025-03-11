<?php

namespace App\Http\Controllers;

use App\Models\GatewayNumber;
use App\Models\LeadNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ChatController extends Controller
{


    public function __construct()
    {
        Inertia::share([
            'gateway_numbers' => GatewayNumber::get()
        ]);
    }


    public function dashboard(){
        return Inertia::render('Dashboard');
    }
    public function chatPanel($number){

        $gateway_number = GatewayNumber::where('number',$number)->first();
        $lead_numbers = LeadNumber::where('gateway_number_id', $gateway_number->id)->orderBy('id','DESC')->get();
        $data = [
            'lead_numbers' => $lead_numbers
        ];
        return Inertia::render('Chatpanel',$data);
    }
}
