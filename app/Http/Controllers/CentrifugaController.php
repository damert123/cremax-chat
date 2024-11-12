<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CentrifugaController extends Controller
{
    public function sendMessage(Request $request)
    {

        $message = $request->json('message');
        $channel = $request->json('chat_channel');
        $name = $request->json('name');
        $email = $request->json('email');
        $userId = $request->json('userId');

        $data = [
            'method' => 'publish',
            'params' => [
                'channel' => $channel,
                'data' => [
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

        return response()->json([
            'message' => $request->input('message'),
            'chat_channel' => $request->input('chat_channel'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'userId' => $request->input('userId'),
        ]);


    }
}
