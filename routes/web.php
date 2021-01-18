<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\HomeController;

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


Route::get('/messages', function () {
    return view('frontend.messages');
});
Route::get('/service-detail', function () {
    return view('frontend.service-detail');
});
Route::get('/services', function () {
    return view('frontend.services');
});
Route::get('/profile', function () {
    return view('frontend.profile');
});
Route::get('/order', function () {
    return view('frontend.order');
});
Route::get('/manage-orders', function () {
    return view('frontend.manage-orders');
});
Route::get('/create-service', function () {
    return view('frontend.create-service');
});
