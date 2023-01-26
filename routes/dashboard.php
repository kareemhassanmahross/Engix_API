<?php

use App\Http\Controllers\Api\dashbord\Product\ProductController;
use App\Http\Controllers\Api\dashbord\Category\CategoryController;
use App\Http\Controllers\Api\dashbord\categoyOffer\CategoyOfferController;
use App\Http\Controllers\Api\dashbord\Images\ImageController;
use App\Http\Controllers\Api\dashbord\jobs\JobController;
use App\Http\Controllers\Api\dashbord\Offer\OfferController;
use App\Http\Controllers\Api\dashbord\OurClient\OurClientController;
use App\Http\Controllers\Api\dashbord\subcategory\SubCategoryController;
use App\Http\Controllers\Api\slider\SliderController;
use App\Http\Controllers\Api\Suppliers\SupplierController;
use App\Models\CategoryOffer;
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
############################ Route Category ######################

Route::get('/subcats', [SubCategoryController::class, 'index']);
Route::get('/subcat/{id}', [SubCategoryController::class, 'show']);
Route::POST('/subcat/create', [SubCategoryController::class, 'create']);
Route::POST('/subcat/update/{id}', [SubCategoryController::class, 'update']);
Route::delete('/subcat/destroy/{id}', [SubCategoryController::class, 'destroy']);

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
############################ Route OurClient ######################
Route::get('/ourclients', [OurClientController::class, 'index']);
Route::get('/ourclient/{id}', [OurClientController::class, 'show']);
Route::POST('/ourclient/create', [OurClientController::class, 'create']);
Route::POST('/ourclient/update/{id}', [OurClientController::class, 'update']);
Route::delete('/ourclient/destroy/{id}', [OurClientController::class, 'destroy']);
############################ End Route OurClient ######################
############################ Route Job ######################
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/job/{id}', [JobController::class, 'show']);
Route::POST('/job/create', [JobController::class, 'create']);
Route::POST('/job/update/{id}', [JobController::class, 'update']);
Route::delete('/job/destroy/{id}', [JobController::class, 'destroy']);
############################ End Route Job ######################
############################ Route CategoryOffer ######################
Route::get('/categoryoffers', [CategoyOfferController::class, 'index']);
Route::get('/categoryoffer/{id}', [CategoyOfferController::class, 'show']);
Route::POST('/categoryoffer/create', [CategoyOfferController::class, 'create']);
Route::POST('/categoryoffer/update/{id}', [CategoyOfferController::class, 'update']);
Route::delete('/categoryoffer/destroy/{id}', [CategoyOfferController::class, 'destroy']);
############################ End Route CategoryOffer ######################
############################ Route CategoryOffer ######################
Route::get('/Offers', [OfferController::class, 'index']);
Route::get('/offer/{id}', [OfferController::class, 'show']);
Route::POST('/offer/create', [OfferController::class, 'create']);
Route::POST('/offer/update/{id}', [OfferController::class, 'update']);
Route::delete('/offer/destroy/{id}', [OfferController::class, 'destroy']);
############################ End Route CategoryOffer ######################
