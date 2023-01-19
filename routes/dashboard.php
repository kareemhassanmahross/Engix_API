<?php

use App\Http\Controllers\Api\dashbord\Product\ProductController;
use App\Http\Controllers\Api\dashboard\UserAdmin\UserAdminController;
use App\Http\Controllers\Api\dashbord\Category\CategoryController;
use App\Http\Controllers\Api\dashbord\UserAdmin\UserAdminController as UserAdminUserAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::POST('/auth/register', [\App\Http\Controllers\Api\dashbord\AuthController::class, 'createUser']);
Route::POST('/auth/login', [\App\Http\Controllers\Api\dashbord\AuthController::class, 'loginUser']);




########################### End Auth Admin



// Route::resource('/users', [\App\Http\Controllers\Api\dashboard\UserAdmin::class]);
Route::get('/users', [UserAdminUserAdminController::class, 'index']);





############################ Route Category ######################

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::POST('/category/create', [CategoryController::class, 'create']);
Route::PUT('/category/update/{id}', [CategoryController::class, 'update']);
Route::delete('/category/destroy/{id}', [CategoryController::class, 'destroy']);

############################ End Route Category ######################



############################ Route Product ######################

Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::POST('/product/create', [ProductController::class, 'create']);
Route::PUT('/product/update/{id}', [ProductController::class, 'update']);
Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy']);

############################ End Route Product ######################