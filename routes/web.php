<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\HomeController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/authenticate')->name('authenticate.')->group(function(){
    Route::post('/try', [AuthenticateController::class,'authenticate'])->name('try');
    Route::get('/register', [AuthenticateController::class,'register'])->name('register');
    Route::get('/login', [AuthenticateController::class,'login'])->name('login');
    /*Route::post('/reset/password', [AuthenticateController::class,'resetPassword'])->name('reset.password');
    Route::post('/recovery/password/email', [AuthenticateController::class,'recoveryPasswordEmail'])->name('recovery.password.email');
    Route::get('/logout', [AuthenticateController::class,'logout'])->name('logout');
    */
});

/*
Route::prefix('/home')->name('home.')->group(function(){
    Route::any('/start', [HomeController::class,'index'])->name('start');
});
*/

/*
Route::get('/login', function () {
    return view('login');
});
*/

//Auth::routes();

Route::get('/testes', [App\Http\Controllers\HomeController::class, 'teste'])->name('testes');
