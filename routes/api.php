<?php

use App\Http\Controllers\Api\{
    FinancialInstitutionsController,
    ImmobilesController,
    PlaceController,
    UserController,
    VehicleController
};
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
/*
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/user', [UserController::class,'index']); 
    Route::get('/user/{id}', [UserController::class,'show']);
    Route::get('/user/search/{name}', [UserController::class,'search']);
    Route::post('/user', [UserController::class,'store']);
    Route::put('/user/{id}', [UserController::class,'update']);
    Route::delete('/user/{id}', [UserController::class,'destroy']);
    Route::post('/logout', [AuthController::class,'logout']);
});
*/
Route::middleware(['auth:sanctum'])->prefix('/user')->group(function(){    
    Route::get('/', [UserController::class,'index']); 
    Route::get('/{id}', [UserController::class,'show']);
    Route::get('/search/{name}', [UserController::class,'search']);
    Route::post('/', [UserController::class,'store']);
    Route::put('/{id}', [UserController::class,'update']);
    Route::delete('/{id}', [UserController::class,'destroy']);
    Route::post('/logout', [AuthController::class,'logout']);
});

Route::middleware(['auth:sanctum'])->prefix('/immobile')->group(function(){    
    Route::get('/', [ImmobilesController::class,'index']); 
    Route::post('/', [ImmobilesController::class,'store']);
    Route::get('/{id}', [ImmobilesController::class,'show']);
    Route::put('/{id}', [ImmobilesController::class,'update']);
    Route::delete('/{id}', [ImmobilesController::class,'destroy']);
});

Route::middleware(['auth:sanctum'])->prefix('/vehicle')->group(function(){    
    Route::get('/', [VehicleController::class,'index']); 
    Route::post('/', [VehicleController::class,'store']);
    Route::get('/{id}', [VehicleController::class,'show']);
    Route::put('/{id}', [VehicleController::class,'update']);
    Route::delete('/{id}', [VehicleController::class,'destroy']);
});

Route::middleware(['auth:sanctum'])->prefix('/place')->group(function(){    
    Route::get('/', [PlaceController::class,'index']); 
    Route::post('/', [PlaceController::class,'store']);
    Route::put('/{id}', [PlaceController::class,'update']);
    Route::get('/{id}', [PlaceController::class,'show']);
    Route::delete('/{id}', [PlaceController::class,'destroy']);
});

Route::middleware(['auth:sanctum'])->prefix('/financial_institutions')->group(function(){    
    Route::get('/', [FinancialInstitutionsController::class,'index']); 
    Route::post('/', [FinancialInstitutionsController::class,'store']);
    /*Route::put('/{id}', [FinancialInstitutionsController::class,'update']);
    Route::get('/{id}', [FinancialInstitutionsController::class,'show']);
    Route::delete('/{id}', [FinancialInstitutionsController::class,'destroy']);*/
});