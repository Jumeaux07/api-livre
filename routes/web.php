<?php

use App\Http\Controllers\AdminAuth\LoginController;
use App\Http\Controllers\AdminAuth\RegisterController;
use App\Http\Controllers\VIEWS\HomecontrollerView;
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

Route::get('/', [LoginController::class,'showLoginForm'])->name('login');

Route::group(['prefix' => 'admin'], function () {
  Route::post('/login', [LoginController::class,'login']);
  Route::post('/logout', [LoginController::class,'logout'])->name('logout');

  Route::get('/register', [RegisterController::class,'showRegistrationForm'])->name('register');
  Route::post('/register', [RegisterController::class,'register']);

  Route::resource('home',HomecontrollerView::class);

//   Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
//   Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
//   Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
//   Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});
