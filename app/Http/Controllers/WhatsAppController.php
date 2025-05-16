<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WhatsAppController extends Controller
{
    public function verify(Request $request)
    {
        try {
            $token = env('WHATSAPP_VERIFY_TOKEN');
            if ($request->hub_verify_token === $token) {
                return response($request->hub_challenge, 200);
            }
            return response('Invalid verify token', 403);
        }catch (\Exception $exception){
            Log::info('message', ['ssss' => $exception->getMessage()]);
            return response('Invalid verify token', 403);
        }
    }

    public function webhook(Request $request)
    {
        try {
            $data = $request->all();
            Log::info('Webhook Received', ['data' => $data]);

            // Check if the event contains messages
            if (isset($data['entry'][0]['changes'][0]['value']['messages'][0])) {
                $message = $data['entry'][0]['changes'][0]['value']['messages'][0];
                $from = $message['from']; // Sender's WhatsApp number
                $text = $message['text']['body'] ?? ''; // Message text

                // Respond based on the received message
                if (strtolower($text) === 'hello') {
                    $this->sendMessage($from, 'Hi there! How can I assist you?');
                } else {
                    $this->sendMessage($from, "Sorry, I didn't understand that.");
                }
            }

            return response('Event processed', 200);
        } catch (\Exception $e) {
            Log::error('Webhook Error', ['error' => $e->getMessage()]);
            return response('Error processing webhook', 500);
        }
    }

    private function sendMessage($to, $message)
    {
        $url = 'https://graph.facebook.com/v15.0/' . env('WHATSAPP_PHONE_ID') . '/messages';
        $client = new Client();

        $response = $client->post($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . env('WHATSAPP_ACCESS_TOKEN'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'messaging_product' => 'whatsapp',
                'to' => $to,
                'text' => ['body' => $message],
            ],
        ]);

        return $response->getBody()->getContents();
    }
}
