<?php

namespace App\Services;

use GuzzleHttp\Client;

class SignalWireService
{
    protected $client;
    protected $projectKey;
    protected $spaceUrl;
    protected $fromNumber;

    public function __construct()
    {
        // Set up your SignalWire credentials and API details here
        $this->projectKey = env('SIGNALWIRE_PROJECT_KEY');
        $this->spaceUrl = env('SIGNALWIRE_SPACE_URL');
        $this->fromNumber = env('SIGNALWIRE_FROM_NUMBER');
        $this->client = new Client();
    }

    /**
     * Send an SMS message via SignalWire
     *
     * @param string $to
     * @param string $message
     * @return array
     */
    public function sendSms(string $to, string $message)
    {
        try {
            $response = $this->client->post("https://{$this->spaceUrl}.signalwire.com/api/laml/2010-04-01/Accounts/{$this->projectKey}/Messages.json", [
                'form_params' => [
                    'To' => $to,
                    'From' => $this->fromNumber,
                    'Body' => $message,
                ],
            ]);

            // Return the response as an array
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
