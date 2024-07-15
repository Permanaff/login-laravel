<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
});


Route::get('/home', function () {
    // return view('home');
    return redirect(('/check'));
});



Route::middleware(['auth'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->middleware('userAccess:2');
    Route::get('/operator', [AdminController::class, 'operator'])->middleware('userAccess:1');
    Route::get('/user', [AdminController::class, 'user'])->middleware('userAccess:0');
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/check', [AdminController::class, 'checkrole']);
});


