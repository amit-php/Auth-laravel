<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\IncomeController;
use App\Http\Middleware\checkLogin;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login',function(){
    return view('login');
})->name('login');

Route::get('/signup',function(){
    return view('signup');
})->name('signup');

Route::post('regesterSave', [UserController::class,'regester'])->name('regesterSave');

Route::post('logincheck', [UserController::class,'login'])->name('logincheck');



Route::post('logout', [UserController::class,'logout'])->name('logout');

//route for login page
Route::middleware([checkLogin::class])->group(function () {
    Route::get('/dashboard',[UserController::class,'dasbordpage'])->name('dashboard');
    Route::resource('type', CategoryController::class);
    Route::resource('expense', TransactionController::class);
    // Custom route with additional parameters
//Route::get('expense/{date}/{income}', [TransactionController::class, 'show']);

    Route::resource('income', IncomeController::class);
});

Route::get('news', function () {
      return view('news')  ;  
})->name('news');
