<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;  
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\CountryController;

Route::resource('countries', CountryController::class)->only('index');
Route::resource('addresses', AddressController::class)->only(['index','store','destroy']);

Route::group(['prefix' => 'auth'], function() {
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login',    [RegisterController::class, 'login']);

    Route::middleware('auth:api')->group( function () {
        Route::post('me', [UserController::class,'getUser']);
    });
});