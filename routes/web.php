<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CreateServiceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', HomeController::class);
// Language Change
Route::get('lang/change', [HomeController::class, 'change'])->name('changeLang');

Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/404', function () {
    return view('frontend.404');
});
Route::get('/account', function () {
    return view('frontend.account');
});
Route::get('/become-a-seller', function () {
    return view('frontend.become-a-seller');
});
Route::get('/company-profile', function () {
    return view('frontend.company-profile');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/faq', function () {
    return view('frontend.faq');
});
// Route::get('/forgot-password', function () {
//     return view('frontend.forgot-password');
// });
Route::resource('/categories', CategoriesController::class);

Route::match(['get','post'],'/register', [RegisterController::class, 'register']);
Route::get('/login', [RegisterController::class, 'accountLogin']);
Route::post('/login', [RegisterController::class, 'checkLogin']);
Route::get('/verify-account/{username}/{token}', [RegisterController::class, 'VerifyAccount'])->name('verify');
Route::get('/logout', [RegisterController::class, 'logout'])->name('logout');
// Forgot Password routes
Route::get('/forgot-password', [RegisterController::class, 'forgotPasswordRoute'])->name('forgot-password');
Route::post('/password/email', [RegisterController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{email}/{token}', [RegisterController::class, 'showPasswordResetForm']);
Route::post('/reset-password', [RegisterController::class, 'resetPassword']);

// Socail Login
Route::get('login/facebook', [SocialAuthController::class, 'redirectToFacebookProvider']);
Route::get('facebook/callback', [SocialAuthController::class, 'FacebookProviderCallback']);
// Route::get('login/instagram',[SocialAuthController::class, 'redirectToInstagramProvider']);
// Route::get('instagram/callback', [SocialAuthController::class, 'instagramProviderCallback']);
// Route::get('login/twitter', [SocialAuthController::class, 'redirectToTwitterProvider']);
// Route::get('twitter/callback', [SocialAuthController::class, 'TwitterProviderCallback']);
Route::get('login/google', [SocialAuthController::class, 'redirectToGoogle']);
Route::get('google/callback', [SocialAuthController::class, 'GoogleProviderCallback']);


// Profile
Route::get('profile/{username}', [ProfileController::class, 'show']);
Route::get('/profile', [ProfileController::class,'index']);
Route::get('settings', [ProfileController::class,'edit_profile']);
Route::post('edit_profile_info', [ProfileController::class,'edit_profile_info']);
Route::get('/messages', function () {
    return view('frontend.messages');
});

// Service Route
Route::resource('/create-service', CreateServiceController::class);
Route::post('/fetch_subcategory', [CreateServiceController::class, 'fetch_subcategory']);
Route::post('/fetch_package_option', [CreateServiceController::class, 'fetch_package_option']);
Route::match(['get','post'],'/post_service', [CreateServiceController::class, 'post_service']);

Route::get('/services/{url}', [ServiceController::class, 'index']);
Route::get('/services/{url}/{child_url}', [ServiceController::class, 'index']);


Route::get('/get_services', [ServiceController::class, 'get_services']);
Route::get('/search', [ServiceController::class, 'search_service']);
Route::get('/{username}/{url}', [ServiceController::class, 'service_detail']);

// Categories

Route::get('/order', function () {
    return view('frontend.order');
});
Route::get('/manage-orders', function () {
    return view('frontend.manage-orders');
});

