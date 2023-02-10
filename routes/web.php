<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ProfileController;
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


//admin Route start from here

Route::get('/admin-login', [AuthController::class, 'loginForm'])->name('admin.login');
Route::get('/admin-registration-form', [AuthController::class, 'registrationForm'])->name('admin.registration');
Route::post('/admin-registration-store', [AuthController::class, 'store'])->name('admin.info');
Route::post('/admin-login-process', [AuthController::class, 'loginProcess'])->name('adminLogin.process');
Route::get('/admin-forget-password-form', [AuthController::class, 'forgetPassword'])->name('adminPassword.forget');
Route::post('/admin-forget-password/reset-link', [AuthController::class, 'resetPassword'])->name('adminPassword.forget');

Route::group(['middleware'=>'auth', 'prefix'=>'admin'], function(){

    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'viewProfile'])->name('admin.profile');
    Route::get('/reset-password', [ProfileController::class, 'resetPassword'])->name('admin.resetPassword');

});
