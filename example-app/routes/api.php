<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('clients', [ClientController::class, 'index']);
Route::post('clients', [ClientController::class, 'store']);
Route::get('clients/{id}/edit', [ClientController::class, 'edit']);
Route::get('clients/{id}', [ClientController::class, 'show']);
Route::get('clients/{id}/edit', [ClientController::class, 'edit']);
Route::put('clients/{id}/edit', [ClientController::class, 'update']);
Route::delete('clients/{id}/delete', [ClientController::class, 'delete']);
