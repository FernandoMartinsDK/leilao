<?php

use App\Http\Controllers\{
    AuctionController, 
    AuthenticateController,
    BidController,
    UserController,
    HomeController,
    InstitutionController,
    ItemController
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/teste', [App\Http\Controllers\HomeController::class, 'teste'])->name('teste');

Route::get('/', [AuthenticateController::class,'login'])->name('login');
Route::get('/logout', [AuthenticateController::class,'logout'])->name('logout');
Route::get('/register', [AuthenticateController::class,'create'])->name('register');


Route::prefix('/authenticate')->name('authenticate.')->group(function(){
    Route::post('/try', [AuthenticateController::class,'authenticate'])->name('try');
    Route::post('/store', [AuthenticateController::class,'store'])->name('store');
    /*Route::post('/reset/password', [AuthenticateController::class,'resetPassword'])->name('reset.password');
    Route::post('/recovery/password/email', [AuthenticateController::class,'recoveryPasswordEmail'])->name('recovery.password.email');
    Route::get('/logout', [AuthenticateController::class,'logout'])->name('logout');
    */
});

Route::prefix('/home')->name('home.')->group(function(){
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/update', [HomeController::class, 'update'])->name('update');
    Route::get('/show', [HomeController::class, 'show'])->name('show');
});

Route::prefix('/user')->name('user.')->group(function(){
    Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
});

Route::prefix('/auction')->name('auction.')->group(function(){
    Route::get('/create', [AuctionController::class, 'create'])->name('create');
    Route::get('/institutions', [InstitutionController::class, 'index'])->name('institutions');
});

Route::prefix('/bid')->name('bid.')->group(function(){
    Route::get('/historic/{id}', [BidController::class, 'index'])->name('historic');
});

Route::prefix('/item')->name('item.')->group(function(){
    Route::post('/', [ItemController::class, 'index']);
    Route::get('/show/{id}/{cate}', [ItemController::class, 'show'])->name('show');
    Route::get('/create', [ItemController::class, 'create'])->name('create');
    Route::post('/search', [ItemController::class, 'search'])->name('search');
    //Route::get('/show/{id}//{cate}', [ItemController::class, 'show'])->name('show');
});

/*
Route::get('/login', function () {
    return view('login');
});
*/

//Auth::routes();

