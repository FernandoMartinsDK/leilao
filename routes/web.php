<?php

use App\Http\Controllers\AuthenticateController;
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

Route::prefix('/authenticate')->name('authenticate.')->group(function(){
    Route::post('/try', [AuthenticateController::class,'authenticate'])->name('try');
    /*Route::get('/reset/password/{token}', [AuthenticateController::class,'pageResetPassword']);
    Route::post('/reset/password', [AuthenticateController::class,'resetPassword'])->name('reset.password');
    Route::post('/recovery/password/email', [AuthenticateController::class,'recoveryPasswordEmail'])->name('recovery.password.email');
    Route::get('/logout', [AuthenticateController::class,'logout'])->name('logout');
    Route::get('/email/remember', function () {
        return view('login.emailRemember');
    })->name('email.remember');*/
});


Route::get('/login', function () {
    return view('login');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/testes', [App\Http\Controllers\HomeController::class, 'teste'])->name('testes');
