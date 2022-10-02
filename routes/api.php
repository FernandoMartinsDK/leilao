<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
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

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/user', [UserController::class,'index']); 
    Route::get('/user/{id}', [UserController::class,'show']);
    Route::get('/user/search/{name}', [UserController::class,'search']);
    Route::post('/user', [UserController::class,'store']);
    Route::put('/user/{id}', [UserController::class,'update']);
    Route::delete('/user/{id}', [UserController::class,'destroy']);
    Route::post('/logout', [AuthController::class,'logout']);
});

/*
Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});
*/