<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

 Route::get('/', function () {
     return view('welcome');
 });

 


 // routes/web.php

 Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

 Route::get('/login', [AuthController::class,'showLoginForm'])->name('login');
 Route::post('/login', [AuthController::class,'login']);
 Route::get('/register', [AuthController::class,'showRegistrationForm'])->name('register');
 Route::post('/register', [AuthController::class,'register']);
 Route::post('/logout', [AuthController::class,'logoutbn'])->name('logout');
 
Route::get('/forget', [ForgotPasswordController::class,'showForgetForm'])->name('forget');
Route::post('/forget', [ForgotPasswordController::class,'postForgetForm']);

Route::get('/forgetPasswordMail', [ForgotPasswordController::class,'showForgetPasswordMailForm'])->name('forgetPasswordMail');

Route::get('/reset', [ResetPasswordController::class,'showResetPasswordForm'])->name('reset');
Route::post('/reset', [ResetPasswordController::class,'postResetForm']);