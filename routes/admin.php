<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\MessageController;
/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
*/


        Route::prefix('admin')->name('admin.')->middleware( 'verified')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('cars', CarController::class);
        Route::resource('users', UserController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('messages', MessageController::class);

    });



    Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('messages', MessageController::class);
});




Auth::routes(['verify' => true]);
