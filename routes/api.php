<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/user', [UserController::class, 'indexUser']);
Route::get('/user/{id}', [UserController::class, 'viewUser']);
Route::post('/user-create', [UserController::class, 'createUser']);
Route::put('/user-update/{id}', [UserController::class, 'editUser']);
Route::delete('/user-delete/{id}', [UserController::class, 'deleteUser']);
