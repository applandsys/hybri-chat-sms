<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class SignalWireService
{
    protected $client;
    protected $projectKey;

    protected $apiToken;
    protected $spaceUrl;
    protected $fromNumber;

    public function __construct()
    {
        // Set up your SignalWire credentials and API details here
        $this->projectKey = env('SIGNALWIRE_PROJECT_KEY');
        $this->apiToken = env('SIGNALWIRE_API_KEY');
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
                    'From' => '+12095937999',
                    'Body' => $message,
                ],
                'auth' => [$this->projectKey, $this->apiToken],
            ]);

            // Return the response as an array
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        } catch (GuzzleException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function requestCallerId(){

        try {
            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Basic PSK_G5PqS9eSCYDpTYpGeLAocwgn'
            ];

            $body = [
                'number' => '+15189946888'
            ];

            $response = $this->client->post('https://pixma-agency.signalwire.com/api/relay/rest/verified_caller_ids', [
                'headers' => $headers,
                'json' => $body
            ]);

            return json_decode($response->getBody()->getContents(), true);

        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        } catch (GuzzleException $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
