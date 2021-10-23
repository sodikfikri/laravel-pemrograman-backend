<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/index', [AnimalController::class, 'index']);
Route::get('/index/{id}', [AnimalController::class, 'get_data_by_index']);
Route::post('/store', [AnimalController::class, 'create']);
Route::put('/update', [AnimalController::class, 'update']);
Route::delete('/delete', [AnimalController::class, 'delete']);