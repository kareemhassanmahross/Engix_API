<?php

use App\Http\Controllers\Api\dashbord\aboutus\AboutUsController;
use App\Http\Controllers\Api\dashbord\AuthController;
use App\Http\Controllers\Api\dashbord\Product\ProductController;
use App\Http\Controllers\Api\dashbord\Category\CategoryController;
use App\Http\Controllers\Api\dashbord\categoryOurWork\categoryOurWorkController;
use App\Http\Controllers\Api\dashbord\CategoryProgram\CategoryProgramController;
use App\Http\Controllers\Api\dashbord\categoyOffer\CategoyOfferController;
use App\Http\Controllers\Api\dashbord\contactus\ContactUsController;
use App\Http\Controllers\Api\dashbord\Customerserrvice\CustomerService;
use App\Http\Controllers\Api\dashbord\Images\ImageController;
use App\Http\Controllers\Api\dashbord\jobs\JobController;
use App\Http\Controllers\Api\dashbord\Offer\OfferController;
use App\Http\Controllers\Api\dashbord\OurClient\OurClientController;
use App\Http\Controllers\Api\dashbord\OurWork\OurWorkController;
use App\Http\Controllers\Api\dashbord\Program\ProgramsController;
use App\Http\Controllers\Api\dashbord\socialmedia\SocialMediaController;
use App\Http\Controllers\Api\dashbord\subcategory\SubCategoryController;
use App\Http\Controllers\Api\slider\SliderController;
use App\Http\Controllers\Api\Suppliers\SupplierController;
use App\Http\Controllers\SendCardByEmailController;
use App\Http\Controllers\sendComplainByEmail;
use App\Http\Controllers\SendEmailResetPasswordController;
use App\Http\Controllers\sendGetCotaByEmail;
use Illuminate\Support\Facades\Route;

// Route::get('/cd', [App\Http\Controllers\ContactUsController::class, 'index']);

####################### Email #############################

Route::post('/ForgetPassword', [SendEmailResetPasswordController::class, 'resetPasswordEmail']);
Route::get('/reset/{id}', [SendEmailResetPasswordController::class, 'reset']);
Route::POST('/updatePassword', [SendEmailResetPasswordController::class, 'update']);
Route::post('/SendComplain', [sendComplainByEmail::class, 'index']);
Route::post('/SentGetCota', [sendGetCotaByEmail::class, 'index']);
Route::post('/SendEmailOrder', [SendCardByEmailController::class, 'SendEmailOrder']);
####################### End-Email #############################

// Route::group(['prefix' => 'admin-dashboard'], function () {
//     Route::POST('/register', [AuthController::class, 'createUser']);
//     Route::POST('/login', [AuthController::class, 'loginUser']);
//     Route::POST('/logout', [AuthController::class, 'logoutUser'])->middleware('auth:sanctum');
// });
############################ Route Category ######################
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'show']);
    Route::POST('/create', [CategoryController::class, 'create']);
    Route::POST('/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/destroy/{id}', [CategoryController::class, 'destroy']);
});
############################ End Route Category ######################
############################ Route Category ##########################
Route::group(['prefix' => 'subcats'], function () {
    Route::get('/', [SubCategoryController::class, 'index']);
    Route::get('/{id}', [SubCategoryController::class, 'show']);
    Route::POST('/create', [SubCategoryController::class, 'create']);
    Route::POST('/update/{id}', [SubCategoryController::class, 'update']);
    Route::delete('/destroy/{id}', [SubCategoryController::class, 'destroy']);
});
############################ End Route Category #######################
############################ Route Image Product ######################
Route::group(['prefix' => 'images'], function () {
    Route::get('/', [ImageController::class, 'index']);
    Route::get('/{id}', [ImageController::class, 'show']);
    Route::POST('/create', [ImageController::class, 'create']);
    Route::POST('/update/{id}', [ImageController::class, 'update']);
    Route::delete('/destroy/{id}', [ImageController::class, 'destroy']);
});
############################ End Route Image Product ######################
############################ Route Product ################################
Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::POST('/create', [ProductController::class, 'create']);
    Route::POST('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/destroy/{id}', [ProductController::class, 'destroy']);
});
############################ End Route Product ############################
############################ Route Supplier ###############################
Route::group(['prefix' => 'suppliers'], function () {
    Route::get('/', [SupplierController::class, 'index']);
    Route::get('/{id}', [SupplierController::class, 'show']);
    Route::POST('/create', [SupplierController::class, 'create']);
    Route::POST('/update/{id}', [SupplierController::class, 'update']);
    Route::delete('/destroy/{id}', [SupplierController::class, 'destroy']);
});
############################ End Route Supplier ############################
############################ Route Slider ##################################
Route::group(['prefix' => 'sliders'], function () {
    Route::get('/', [SliderController::class, 'index']);
    Route::get('/{id}', [SliderController::class, 'show']);
    Route::POST('/create', [SliderController::class, 'create']);
    Route::POST('/update/{id}', [SliderController::class, 'update']);
    Route::delete('/destroy/{id}', [SliderController::class, 'destroy']);
});
############################ End Route Slider ######################
############################ Route OurClient ######################
Route::group(['prefix' => 'ourclients'], function () {
    Route::get('/', [OurClientController::class, 'index']);
    Route::get('/{id}', [OurClientController::class, 'show']);
    Route::POST('/create', [OurClientController::class, 'create']);
    Route::POST('/update/{id}', [OurClientController::class, 'update']);
    Route::delete('/destroy/{id}', [OurClientController::class, 'destroy']);
});
############################ End Route OurClient ######################
############################ Route Job ######################
Route::group(['prefix' => 'jobs'], function () {
    Route::get('/', [JobController::class, 'index']);
    Route::get('/{id}', [JobController::class, 'show']);
    Route::POST('/create', [JobController::class, 'create']);
    Route::POST('/update/{id}', [JobController::class, 'update']);
    Route::delete('/destroy/{id}', [JobController::class, 'destroy']);
});
############################ End Route Job ######################
############################ Route CategoryOffer ######################
Route::group(['prefix' => 'categoryoffers'], function () {
    Route::get('/', [CategoyOfferController::class, 'index']);
    Route::get('/{id}', [CategoyOfferController::class, 'show']);
    Route::POST('/create', [CategoyOfferController::class, 'create']);
    Route::POST('/update/{id}', [CategoyOfferController::class, 'update']);
    Route::delete('/destroy/{id}', [CategoyOfferController::class, 'destroy']);
});
############################ End Route CategoryOffer ######################
############################ Route CategoryOffer ######################
Route::group(['prefix' => 'Offers'], function () {
    Route::get('/', [OfferController::class, 'index']);
    Route::get('/{id}', [OfferController::class, 'show']);
    Route::POST('/create', [OfferController::class, 'create']);
    Route::POST('/update/{id}', [OfferController::class, 'update']);
    Route::delete('/destroy/{id}', [OfferController::class, 'destroy']);
});
############################ End Route CategoryOffer ######################
############################ Route AboutUs ######################
Route::group(['prefix' => 'aboutus'], function () {
    Route::get('/', [AboutUsController::class, 'index']);
    Route::get('/{id}', [AboutUsController::class, 'show']);
    Route::POST('/create', [AboutUsController::class, 'create']);
    Route::POST('/update/{id}', [AboutUsController::class, 'update']);
    Route::delete('/destroy/{id}', [AboutUsController::class, 'destroy']);
});
############################ End Route AboutUs ######################
############################ Route Contact Us ######################
Route::group(['prefix' => 'contactus'], function () {
    Route::get('/', [ContactUsController::class, 'index']);
    Route::get('/{id}', [ContactUsController::class, 'show']);
    Route::POST('/create', [ContactUsController::class, 'create']);
    Route::POST('/update/{id}', [ContactUsController::class, 'update']);
    Route::delete('/destroy/{id}', [ContactUsController::class, 'destroy']);
});
############################ End Route Contact Us ######################
############################ Route Social Media ######################
Route::group(['prefix' => 'socialmedia'], function () {
    Route::get('/', [SocialMediaController::class, 'index']);
    Route::get('/{id}', [SocialMediaController::class, 'show']);
    Route::POST('/create', [SocialMediaController::class, 'create']);
    Route::POST('/update/{id}', [SocialMediaController::class, 'update']);
    Route::delete('/destroy/{id}', [SocialMediaController::class, 'destroy']);
});
############################ End Route category OurWork ######################
Route::group(['prefix' => 'categoryOurWork'], function () {
    Route::get('/', [categoryOurWorkController::class, 'index']);
    Route::get('/{id}', [categoryOurWorkController::class, 'show']);
    Route::POST('/create', [categoryOurWorkController::class, 'create']);
    Route::POST('/update/{id}', [categoryOurWorkController::class, 'update']);
    Route::delete('/destroy/{id}', [categoryOurWorkController::class, 'destroy']);
});
############################ End Route category OurWork ######################
############################ End Route  OurWork ######################
Route::group(['prefix' => 'ourWork'], function () {
    Route::get('/', [OurWorkController::class, 'index']);
    Route::get('/{id}', [OurWorkController::class, 'show']);
    Route::POST('/create', [OurWorkController::class, 'create']);
    Route::POST('/update/{id}', [OurWorkController::class, 'update']);
    Route::delete('/destroy/{id}', [OurWorkController::class, 'destroy']);
});
############################ End Route  OurWork ######################
############################ End Route  CategoryProgram ######################
Route::group(['prefix' => 'CategoryProgram'], function () {
    Route::get('/', [CategoryProgramController::class, 'index']);
    Route::get('/{id}', [CategoryProgramController::class, 'show']);
    Route::POST('/create', [CategoryProgramController::class, 'create']);
    Route::POST('/update/{id}', [CategoryProgramController::class, 'update']);
    Route::delete('/destroy/{id}', [CategoryProgramController::class, 'destroy']);
});
############################ End Route  CategoryProgram ######################
############################ End Route  SubCategoryProgram ######################
Route::group(['prefix' => 'Program'], function () {
    Route::get('/', [ProgramsController::class, 'index']);
    Route::get('/{id}', [ProgramsController::class, 'show']);
    Route::POST('/create', [ProgramsController::class, 'create']);
    Route::POST('/update/{id}', [ProgramsController::class, 'update']);
    Route::delete('/destroy/{id}', [ProgramsController::class, 'destroy']);
});
############################ End Route  SubCategoryProgram ######################
Route::group(['prefix' => 'CustomerService'], function () {
    Route::get('/', [CustomerService::class, 'index']);
    Route::get('/{id}', [CustomerService::class, 'show']);
    Route::POST('/create', [CustomerService::class, 'create']);
    Route::POST('/update/{id}', [CustomerService::class, 'update']);
    Route::delete('/destroy/{id}', [CustomerService::class, 'destroy']);
});