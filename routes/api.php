<?php


use App\Http\Controllers\Api\dashbord\AuthUserController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'user'], function () {
    Route::POST('/register', [AuthUserController::class, 'createUser']);
    Route::POST('/login', [AuthUserController::class, 'loginUser']);
    Route::POST('/logout', [AuthUserController::class, 'logoutUser'])->middleware('auth:sanctum');
});
