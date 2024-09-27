<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Dotenv\Exception\ValidationException;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RestPasswordController;

use function Laravel\Prompts\password;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return redirect()->route('login');
});

//Rutas del Sitio
Route::view('login', 'login')->name('login')->middleware('guest');
Route::view('dashboard', 'dashboard')->middleware('auth');
Route::view('welcome', 'welcome')->middleware('auth');

//Ruta del Login y Recovery
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [RestPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [RestPasswordController::class, 'reset'])->name('password.update');


