<?php

use App\Http\Controllers\Api\V1\SatelliteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->prefix('v1')->group(function () {
    Route::apiResource('/satellite', SatelliteController::class);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
