<?php

use App\Http\Controllers\Api\dashbord\aboutus\AboutUsController;
use App\Http\Controllers\Api\dashbord\AuthController;
use App\Http\Controllers\Api\dashbord\Product\ProductController;
use App\Http\Controllers\Api\dashbord\Category\CategoryController;
use App\Http\Controllers\Api\dashbord\categoryOurWork\categoryOurWorkController;
use App\Http\Controllers\Api\dashbord\categoyOffer\CategoyOfferController;
use App\Http\Controllers\Api\dashbord\contactus\ContactUsController;
use App\Http\Controllers\Api\dashbord\Images\ImageController;
use App\Http\Controllers\Api\dashbord\jobs\JobController;
use App\Http\Controllers\Api\dashbord\Offer\OfferController;
use App\Http\Controllers\Api\dashbord\OurClient\OurClientController;
use App\Http\Controllers\Api\dashbord\socialmedia\SocialMediaController;
use App\Http\Controllers\Api\dashbord\subcategory\SubCategoryController;
use App\Http\Controllers\Api\slider\SliderController;
use App\Http\Controllers\Api\Suppliers\SupplierController;
use Illuminate\Support\Facades\Route;

// Route::group(['prefix' => 'admin-dashboard'], function () {
Route::POST('/register', [AuthController::class, 'createUser']);
Route::POST('/login', [AuthController::class, 'loginUser']);
// });

Route::get('/index', [\App\Http\Controllers\ContactUsController::class, 'index']);

// Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'Admin'], function () {
############################ Route Category ######################
// Route::group(['middleware' => 'can:categories'], function () {
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::POST('/category/create', [CategoryController::class, 'create']);
Route::POST('/category/update/{id}', [CategoryController::class, 'update']);
Route::delete('/category/destroy/{id}', [CategoryController::class, 'destroy']);
// });
############################ End Route Category ######################
############################ Route Category ######################
// Route::group(['middleware' => 'can:subcats'], function () {
Route::get('/subcats', [SubCategoryController::class, 'index']);
Route::get('/subcat/{id}', [SubCategoryController::class, 'show']);
Route::POST('/subcat/create', [SubCategoryController::class, 'create']);
Route::POST('/subcat/update/{id}', [SubCategoryController::class, 'update']);
Route::delete('/subcat/destroy/{id}', [SubCategoryController::class, 'destroy']);
// });
############################ End Route Category ######################
############################ Route Image Product ######################
// Route::group(['middleware' => 'can:images'], function () {
Route::get('/images', [ImageController::class, 'index']);
Route::get('/image/{id}', [ImageController::class, 'show']);
Route::POST('/image/create', [ImageController::class, 'create']);
Route::POST('/image/update/{id}', [ImageController::class, 'update']);
Route::delete('/image/destroy/{id}', [ImageController::class, 'destroy']);
// });
############################ End Route Image Product ######################
############################ Route Product ######################
// Route::group(['middleware' => 'can:products'], function () {
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::POST('/product/create', [ProductController::class, 'create']);
Route::POST('/product/update/{id}', [ProductController::class, 'update']);
Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy']);
// });
############################ End Route Product ######################
############################ Route Supplier ######################
// Route::group(['middleware' => 'can:suppliers'], function () {
Route::get('/suppliers', [SupplierController::class, 'index']);
Route::get('/supplier/{id}', [SupplierController::class, 'show']);
Route::POST('/supplier/create', [SupplierController::class, 'create']);
Route::POST('/supplier/update/{id}', [SupplierController::class, 'update']);
Route::delete('/supplier/destroy/{id}', [SupplierController::class, 'destroy']);
// });
############################ End Route Supplier ######################
############################ Route Slider ######################
// Route::group(['middleware' => 'can:sliders'], function () {
Route::get('/sliders', [SliderController::class, 'index']);
Route::get('/slider/{id}', [SliderController::class, 'show']);
Route::POST('/slider/create', [SliderController::class, 'create']);
Route::POST('/slider/update/{id}', [SliderController::class, 'update']);
Route::delete('/slider/destroy/{id}', [SliderController::class, 'destroy']);
// });
############################ End Route Slider ######################
############################ Route OurClient ######################
// Route::group(['middleware' => 'can:ourclients'], function () {
Route::get('/ourclients', [OurClientController::class, 'index']);
Route::get('/ourclient/{id}', [OurClientController::class, 'show']);
Route::POST('/ourclient/create', [OurClientController::class, 'create']);
Route::POST('/ourclient/update/{id}', [OurClientController::class, 'update']);
Route::delete('/ourclient/destroy/{id}', [OurClientController::class, 'destroy']);
// });
############################ End Route OurClient ######################
############################ Route Job ######################
// Route::group(['middleware' => 'can:jobs'], function () {
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/job/{id}', [JobController::class, 'show']);
Route::POST('/job/create', [JobController::class, 'create']);
Route::POST('/job/update/{id}', [JobController::class, 'update']);
Route::delete('/job/destroy/{id}', [JobController::class, 'destroy']);
// });
############################ End Route Job ######################
############################ Route CategoryOffer ######################
// Route::group(['middleware' => 'can:categoryoffers'], function () {
Route::get('/categoryoffers', [CategoyOfferController::class, 'index']);
Route::get('/categoryoffer/{id}', [CategoyOfferController::class, 'show']);
Route::POST('/categoryoffer/create', [CategoyOfferController::class, 'create']);
Route::POST('/categoryoffer/update/{id}', [CategoyOfferController::class, 'update']);
Route::delete('/categoryoffer/destroy/{id}', [CategoyOfferController::class, 'destroy']);
// });
############################ End Route CategoryOffer ######################
############################ Route CategoryOffer ######################
// Route::group(['middleware' => 'can:Offers'], function () {
Route::get('/Offers', [OfferController::class, 'index']);
Route::get('/offer/{id}', [OfferController::class, 'show']);
Route::POST('/offer/create', [OfferController::class, 'create']);
Route::POST('/offer/update/{id}', [OfferController::class, 'update']);
Route::delete('/offer/destroy/{id}', [OfferController::class, 'destroy']);
// });
############################ End Route CategoryOffer ######################
############################ Route AboutUs ######################
// Route::group(['middleware' => 'can:aboutus'], function () {
Route::get('/aboutus', [AboutUsController::class, 'index']);
Route::get('/aboutus/{id}', [AboutUsController::class, 'show']);
Route::POST('/aboutus/create', [AboutUsController::class, 'create']);
Route::POST('/aboutus/update/{id}', [AboutUsController::class, 'update']);
Route::delete('/aboutus/destroy/{id}', [AboutUsController::class, 'destroy']);
// });
############################ End Route AboutUs ######################
############################ Route Contact Us ######################
// Route::group(['middleware' => 'can:contactus'], function () {
Route::get('/contactus', [ContactUsController::class, 'index']);
Route::get('/contactus/{id}', [ContactUsController::class, 'show']);
Route::POST('/contactus/create', [ContactUsController::class, 'create']);
Route::POST('/contactus/update/{id}', [ContactUsController::class, 'update']);
Route::delete('/contactus/destroy/{id}', [ContactUsController::class, 'destroy']);
// });
############################ End Route Contact Us ######################
############################ Route Social Media ######################
// Route::group(['middleware' => 'can:socialmedia'], function () {
Route::get('/socialmedia', [SocialMediaController::class, 'index']);
Route::get('/socialmedia/{id}', [SocialMediaController::class, 'show']);
Route::POST('/socialmedia/create', [SocialMediaController::class, 'create']);
Route::POST('/socialmedia/update/{id}', [SocialMediaController::class, 'update']);
Route::delete('/socialmedia/destroy/{id}', [SocialMediaController::class, 'destroy']);
// });
############################ End Route Social Media ######################
// Route::group(['middleware' => 'can:categoryOurWork'], function () {
Route::get('/categoryOurWork', [categoryOurWorkController::class, 'index']);
Route::get('/categoryOurWork/{id}', [categoryOurWorkController::class, 'show']);
Route::POST('/categoryOurWork/create', [categoryOurWorkController::class, 'create']);
Route::POST('/categoryOurWork/update/{id}', [categoryOurWorkController::class, 'update']);
Route::delete('/categoryOurWork/destroy/{id}', [categoryOurWorkController::class, 'destroy']);
    // });
    ############################ End Route Social Media ######################
// });
