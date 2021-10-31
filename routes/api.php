<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;

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

// animals root
Route::get('/index', [AnimalController::class, 'index']);
Route::get('/index/{id}', [AnimalController::class, 'get_data_by_index']);
Route::post('/store', [AnimalController::class, 'create']);
Route::put('/update', [AnimalController::class, 'update']);
Route::delete('/delete', [AnimalController::class, 'delete']);

// students root
Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{id}', [StudentController::class, 'find']);
Route::post('/students/create', [StudentController::class, 'create']);
Route::put('/students/update', [StudentController::class, 'update']);
Route::delete('/students/delete', [StudentController::class, 'destroy']);