<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MovieController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where I can register API routes for my application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group.
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/test', function () {return 'test';});

Route::get('/movies', [MovieController::class, 'list']);

Route::get('/movie/{id}', [MovieController::class, 'read']);

Route::post('/movie', [MovieController::class, 'create']);

Route::put('/movie/{id}', [MovieController::class, 'update']);

Route::delete('/movie/{id}', [MovieController::class, 'delete']);
