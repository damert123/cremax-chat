<?php

use App\Http\Controllers\CentrifugaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/send-message', [CentrifugaController::class, 'sendMessage']);
