<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\UserController;
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

Route::controller(SettingsController::class)->group(function () {
    Route::get('cities', 'getCities');
    Route::get('regions/{city_id}', 'getRegions');
    Route::get('terms', 'getTerms');
    Route::get('about', 'getAbout');
    Route::get('faqs', 'getFaqs');
    Route::get('colors', 'getColors');
    Route::get('brands', 'getBrands');
    Route::get('categories', 'getCategories');
    if (request()->header('Authorization')) {
        Route::group(['middleware' => 'auth:sanctum'], function () {
            Route::post('contactus', 'insertContactForm');
            Route::get('notifications', 'getNotifications');
            Route::post('send-query', 'send_query');
            Route::get('my-queries', 'myQueries');
        });
    } else {
        Route::post('contactus', 'insertContactForm');
        Route::post('become-vendor', 'becomeVendor');
    }
});

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'signUp');
    Route::post('login', 'login');
    Route::post('sendverifycode', 'sendVerificationCode');
    Route::post('verifycode', 'verifyCode');
    Route::post('changepassword', 'changePassword');
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('logout', 'logout');
        Route::get('getprofile', 'userProfile');
        Route::post('updateprofile', 'updateUserProfile');
        Route::post('updatefirebase', 'updateUserFirebase');
        Route::post('updatelang', 'updateLang');
        Route::post('updatepasswordprofile', 'updatePasswordProfile');
        Route::post('suspend', 'suspend');
    });
});

Route::controller(UserController::class)->group(function () {

    if (request()->header('Authorization')) {
        Route::group(['middleware' => 'auth:sanctum'], function () {
            Route::get('home', 'home');
            Route::get('events-categories', 'eventsCategories');
            Route::post('search', 'search');
            Route::get('all-products', 'getProducts');
            Route::get('event-halls/{category_id}', 'eventHalls');
            Route::get('latest-wedings-halls', 'latestWedingsHalls');
            Route::get('latest-birthdays-halls', 'latestBirthdaysHalls');
            Route::get('latest-engagements-halls', 'latestEngagementsHalls');
            Route::get('latest-conferences-halls', 'latestConferencesHalls');
            Route::get('get-fav', 'getFavoriteList');
            Route::post('add-fav', 'addFavorite');
            Route::get('product-details/{product_id}', 'getProduct');
            Route::get('hall-details/{hall_id}', 'getHall');
            Route::post('add-halls-cart', 'createHallsCart');
            Route::get('get-halls-cart', 'getHallsCart');
            Route::post('checkout-hall', 'checkoutHall');
        });
    } else {
        Route::get('home', 'home');
        Route::post('search', 'search');
        Route::get('events-categories', 'eventsCategories');
        Route::get('event-halls/{category_id}', 'eventHalls');
        Route::get('latest-wedings-halls', 'latestWedingsHalls');
        Route::get('latest-birthdays-halls', 'latestBirthdaysHalls');
        Route::get('latest-engagements-halls', 'latestEngagementsHalls');
        Route::get('latest-conferences-halls', 'latestConferencesHalls');
        Route::get('all-products', 'getProducts');
        Route::get('brand-products/{brand_id}', 'getBrandProducts');
        Route::get('category-products/{category_id}', 'getCategoryProducts');
        Route::get('product-details/{product_id}', 'getProduct');
        Route::get('hall-details/{hall_id}', 'getHall');
        Route::get('package-details/{package_id}', 'getPackage');
    }
});