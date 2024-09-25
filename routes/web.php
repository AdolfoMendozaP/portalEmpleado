<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Dotenv\Exception\ValidationException;
use Illuminate\Auth\Events\Login;



/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::view('login', 'login')->name('login')->middleware('guest');
Route::view('dashboard', 'dashboard')->middleware('auth');
Route::view('welcome', 'welcome')->middleware('auth');

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);
