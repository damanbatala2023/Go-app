<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CrudController;
use App\Http\Middleware\AdminAuthenticate;
use App\Http\Middleware\UserAuthenticate;



 Route::get('/', function () {
     return view('welcome');
 });


// using prefix method to make route clear
// Route::prefix('admin')->name('admin.')->group(function(){
    // Here you can write the routes of admin 
// })


 // Admin routes

 Route::get('/admin/login', [AdminLoginController::class,'getAdminLogin'])->name('admin.login');
 Route::post('/admin/login', [AdminLoginController::class,'postAdminLogin']);
 Route::post('/admin/logout', [AdminLoginController::class,'logout'])->name('admin.logout');

// middleware
 Route::get('/admin/dashboard', [AdminDashboardController::class,'getAdminDashboard'])->name('admin.dashboard')->middleware(AdminAuthenticate::class);
 Route::get('/home/dashboard', [DashboardController::class,'index'])->name('home.dashboard')->middleware(UserAuthenticate::class);

//  Admin crud system
Route::get('/crud/record',[CrudController::class,'getRecordForm'])->name('crud.record');
Route::get('/crud/{id}/edit',[CrudController::class,'getEditForm'])->name('crud.edit');
Route::post('/crud/{id}/edit',[CrudController::class,'postEditForm']);
Route::delete('/crud/{id}',[CrudController::class,'getDelete'])->name('crud.delete');



//  User routes
 Route::get('/login', [AuthController::class,'showLoginForm'])->name('login');
 Route::post('/login', [AuthController::class,'login']);

 Route::get('/register', [AuthController::class,'showRegistrationForm'])->name('register');
 Route::post('/register', [AuthController::class,'register']);
 
 
 
Route::get('/forget', [ForgotPasswordController::class,'showForgetForm'])->name('forget');
Route::post('/forget', [ForgotPasswordController::class,'postForgetForm']);

Route::get('/forgetPasswordMail', [ForgotPasswordController::class,'showForgetPasswordMailForm'])->name('forgetPasswordMail');

Route::get('/reset', [ResetPasswordController::class,'showResetPasswordForm'])->name('reset');
Route::post('/reset', [ResetPasswordController::class,'postResetForm']);

