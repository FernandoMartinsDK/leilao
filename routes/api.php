<?php

use App\Http\Controllers\Api\{
    AddressController,
    AuctionController,
    BidsController,
    BrandsController,
    CarModelsController,
    CategoriesController,
    FinancialInstitutionsController,
    ImmobilesController,
    ItemsController,
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
Route::post('/test', function (Request $request) {
    return 'ok';
});

Route::post('/register', [AuthController::class,'register']);
Route::post('/login', [AuthController::class,'login']);

Route::middleware(['auth:sanctum'])->prefix('/user')->group(function(){ 
    Route::put('/{id}', [UserController::class,'update']);
    Route::put('/password/{id}', [UserController::class,'passwordUpdate']);
    Route::get('/{id}', [UserController::class,'show']);
    /*Route::get('/', [UserController::class,'index']); 
    Route::get('/search/{name}', [UserController::class,'search']);
    Route::post('/', [UserController::class,'store']);
    Route::delete('/{id}', [UserController::class,'destroy']);*/
    Route::post('/logout', [AuthController::class,'logout']);
});

Route::middleware(['auth:sanctum'])->prefix('/immobile')->group(function(){    
    Route::get('/type', [ImmobilesController::class,'type']);
    /*Route::get('/', [ImmobilesController::class,'index']); 
    Route::post('/', [ImmobilesController::class,'store']);
    Route::get('/{id}', [ImmobilesController::class,'show']);
    Route::put('/{id}', [ImmobilesController::class,'update']);
    Route::delete('/{id}', [ImmobilesController::class,'destroy']);*/
});

Route::middleware(['auth:sanctum'])->prefix('/vehicle')->group(function(){  
    Route::post('/', [VehicleController::class,'store']);
    Route::get('/type', [VehicleController::class,'type']);
    Route::get('/models', [VehicleController::class,'models']);
    /*Route::get('/', [VehicleController::class,'index']); 
    Route::get('/{id}', [VehicleController::class,'show']);
    Route::put('/{id}', [VehicleController::class,'update']);
    Route::delete('/{id}', [VehicleController::class,'destroy']);*/
});

Route::middleware(['auth:sanctum'])->prefix('/place')->group(function(){    
    Route::get('/', [PlaceController::class,'index']); 
    Route::post('/', [PlaceController::class,'store']);
    Route::get('/{id}', [PlaceController::class,'show']);
    Route::put('/{id}', [PlaceController::class,'update']);
    Route::delete('/{id}', [PlaceController::class,'destroy']);
});

Route::middleware(['auth:sanctum'])->prefix('/financial_institutions')->group(function(){    
    Route::get('/', [FinancialInstitutionsController::class,'index']);
    Route::post('/', [FinancialInstitutionsController::class,'store']);
    Route::put('/{id}', [FinancialInstitutionsController::class,'update']);
    Route::delete('/{id}', [FinancialInstitutionsController::class,'destroy']);
});

Route::middleware(['auth:sanctum'])->prefix('/auctions')->group(function(){    
    Route::post('/', [AuctionController::class,'store']);
    Route::get('/', [AuctionController::class,'index']); 
    Route::get('/resume', [AuctionController::class,'resume']); 
    Route::get('/{id}', [AuctionController::class,'show']);
    Route::put('/{id}', [AuctionController::class,'update']);
    Route::delete('/{id}', [AuctionController::class,'destroy']);
});

Route::middleware(['auth:sanctum'])->prefix('/items')->group(function(){  
    Route::get('/', [ItemsController::class,'index']);
    Route::get('/open', [ItemsController::class,'open']); 
    Route::get('/search/{term}', [ItemsController::class,'search']); 
    Route::get('immobile/auction/{term}', [ItemsController::class,'show_auction_item_immobile']);
    Route::get('vehicle/auction/{term}', [ItemsController::class,'show_auction_item_vehicles']);
    Route::get('/historic/{id}', [ItemsController::class,'historic']);
    Route::post('lance', [ItemsController::class,'lance']);
});

Route::middleware(['auth:sanctum'])->prefix('/address')->group(function(){
    Route::get('/{id}', [AddressController::class,'show']);
    Route::put('/{id}', [AddressController::class,'update']);
    /*Route::get('/', [AuctionController::class,'index']); 
    Route::post('/', [AuctionController::class,'store']);
    Route::delete('/{id}', [AuctionController::class,'destroy']);*/
});

Route::middleware(['auth:sanctum'])->prefix('/bids')->group(function(){
    Route::get('/', [BidsController::class,'index']);
    Route::get('/{id}', [BidsController::class,'show']);
});

Route::middleware(['auth:sanctum'])->prefix('/categories')->group(function(){
    Route::get('/', [CategoriesController::class,'index']);
});

Route::middleware(['auth:sanctum'])->prefix('/brands')->group(function(){
    Route::get('/', [BrandsController::class,'index']);
});

Route::middleware(['auth:sanctum'])->prefix('/car_models')->group(function(){
    Route::get('/', [CarModelsController::class,'index']);
});