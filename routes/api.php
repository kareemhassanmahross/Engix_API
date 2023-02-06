<?php


use App\Http\Controllers\Api\dashbord\AuthUserController;
use Illuminate\Support\Facades\Route;



Route::POST('/user/register', [AuthUserController::class, 'createUser']);
Route::POST('/user/login', [AuthUserController::class, 'loginUser']);