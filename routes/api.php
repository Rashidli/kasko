<?php

use App\Http\Controllers\Api\DaisController;
use App\Http\Controllers\WhatsAppController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', fn (Request $request) => $request->user())->middleware('auth:sanctum');

Route::post('/webhook', [WhatsAppController::class, 'webhook']);
Route::post('/verify', [WhatsAppController::class, 'webhook']);

Route::post('/send-contract-property', [DaisController::class, 'contractProperty']);
Route::post('/status-change-property', [DaisController::class, 'statusChangeProperty']);
Route::post('/terminate-property', [DaisController::class, 'terminateProperty']);
Route::post('/payment-property', [DaisController::class, 'paymentProperty']);
Route::post('/successcallback-property', [DaisController::class, 'successCallbackProperty']);
Route::post('/failurecallback-property', [DaisController::class, 'failureCallbackProperty']);
