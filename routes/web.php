<?php

use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');


Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::get('email/verify/{id}/{hash}', [EmailVerificationController::class, 'verifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationController::class, 'verifyEmailSend'])->middleware('auth')->name('verification.send');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
});
