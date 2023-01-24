<?php

use App\Http\Controllers\Api\dashbord\Product\ProductController;
use App\Http\Controllers\Api\dashbord\Category\CategoryController;
use App\Http\Controllers\Api\dashbord\Images\ImageController;
use App\Http\Controllers\Api\slider\SliderController;
use App\Http\Controllers\Api\Suppliers\SupplierController;

use Illuminate\Support\Facades\Route;
// use LaravelLocalization;
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




// Route::POST('/auth/register', [\App\Http\Controllers\Api\dashbord\AuthController::class, 'createUser']);
// Route::POST('/auth/login', [\App\Http\Controllers\Api\dashbord\AuthController::class, 'loginUser']);




########################### End Auth Admin



// Route::resource('/users', [\App\Http\Controllers\Api\dashboard\UserAdmin::class]);
// Route::get('/users', [UserAdminUserAdminController::class, 'index']);





############################ Route Category ######################

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::POST('/category/create', [CategoryController::class, 'create']);
Route::POST('/category/update/{id}', [CategoryController::class, 'update']);
Route::delete('/category/destroy/{id}', [CategoryController::class, 'destroy']);

############################ End Route Category ######################
############################ Route Image Product ######################
Route::get('/images', [ImageController::class, 'index']);
Route::get('/image/{id}', [ImageController::class, 'show']);
Route::POST('/image/create', [ImageController::class, 'create']);
Route::POST('/image/update/{id}', [ImageController::class, 'update']);
Route::delete('/image/destroy/{id}', [ImageController::class, 'destroy']);
############################ End Route Image Product ######################
############################ Route Product ######################
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::POST('/product/create', [ProductController::class, 'create']);
Route::POST('/product/update/{id}', [ProductController::class, 'update']);
Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy']);

############################ End Route Product ######################
############################ Route Supplier ######################
Route::get('/suppliers', [SupplierController::class, 'index']);
Route::get('/supplier/{id}', [SupplierController::class, 'show']);
Route::POST('/supplier/create', [SupplierController::class, 'create']);
Route::POST('/supplier/update/{id}', [SupplierController::class, 'update']);
Route::delete('/supplier/destroy/{id}', [SupplierController::class, 'destroy']);
############################ End Route Supplier ######################
############################ Route Slider ######################
Route::get('/sliders', [SliderController::class, 'index']);
Route::get('/slider/{id}', [SliderController::class, 'show']);
Route::POST('/slider/create', [SliderController::class, 'create']);
Route::POST('/slider/update/{id}', [SliderController::class, 'update']);
Route::delete('/slider/destroy/{id}', [SliderController::class, 'destroy']);
############################ End Route Slider ######################