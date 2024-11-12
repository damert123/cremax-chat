<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CentrifugaController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $channel = $request->input('chat_channel');
        $name = $request->input('name');
        $email = $request->input('email');
        $userId = $request->input('userId');

        $data = [
            'method' => 'publish',
            'params' => [
                'channel' => $channel,
                'data' => [
                    'message' => $message,
                    "value" => $message,
                    "name" => $name,
                    "email" => $email,
                    "userId" => $userId,
                ],
            ],

        ];

        $response = Http::withHeaders([
            'Authorization' => 'apikey 1a4082eb-1b25-49eb-a2d6-717673e6af84',
        ])->post('http://localhost:8001/api', $data);

        return response()->noContent();


    }
}
