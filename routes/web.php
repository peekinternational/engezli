<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CreateServiceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ChatController;

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
Route::get('currency/change', [HomeController::class, 'CurrencyChange'])->name('changeCurrency');

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
Route::get('/login', [RegisterController::class, 'accountLogin'])->name('login');
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
Route::get('get-city/{id}', [HomeController::class, 'getCities']);
Route::get('get-state/{id}', [HomeController::class, 'getState']);
Route::get('profile/{username}', [ProfileController::class, 'show']);


Route::group(['middleware' => 'auth'], function() {
// Profile
Route::get('/profile', [ProfileController::class,'index']);
Route::match(['get','post'],'/profile_ajax', [ProfileController::class,'reivews_ajax']);
Route::get('settings', [ProfileController::class,'edit_profile']);
Route::post('edit_profile_info', [ProfileController::class,'edit_profile_info']);
Route::get('messages', [ChatController::class,'messages']);

// Route::get('/messages', function () {
//     return view('frontend.messages');
// });
Route::get('/manage-orders-ajax/{order}', [OrderController::class, 'manageOrders_ajax']);
Route::get('/order-details/{number}', [OrderController::class, 'OrderDetails'])->name('order-details');

// Service Route
Route::resource('/create-service', CreateServiceController::class);
Route::post('/create-faq', [CreateServiceController::class, 'createFaq']);
Route::post('/update-faq', [CreateServiceController::class, 'updateFaq']);
Route::get('/delete_faq/{id}', [CreateServiceController::class, 'deleteFaq']);
Route::post('/create-requirements', [CreateServiceController::class, 'createRequirement']);
Route::post('/update-requirement', [CreateServiceController::class, 'updateRequirement']);
Route::get('/delete_requirement/{id}', [CreateServiceController::class, 'deleteRequirement']);
Route::post('/update_gallery', [CreateServiceController::class, 'updateGallery']);

// Route::post('/update-service/{id}', [CreateServiceController::class, 'update_service']);
Route::post('/fetch_subcategory', [CreateServiceController::class, 'fetch_subcategory']);
Route::post('/fetch_package_option', [CreateServiceController::class, 'fetch_package_option']);
Route::match(['get','post'],'/post_service', [CreateServiceController::class, 'post_service']);

// Rating
Route::get('/rating/{number}', [OrderController::class, 'Rating']);
Route::post('/buyer_review', [OrderController::class, 'BuyerReview']);

// Requirements
Route::get('/requirements/{number}', [OrderController::class, 'GetRequirements']);


//  Resolution Center
Route::get('/resolution-center/{number}', [OrderController::class, 'ResolutionCenter']);
Route::post('/make-resolution-request', [OrderController::class, 'ResolutionRequest']);




// Orders
Route::match(['get','post'],'/order', [OrderController::class, 'order'])->name('order');
Route::get('/proceed_order', [OrderController::class, 'proceed_order']);
Route::post('/accept_cancellation', [OrderController::class, 'acceptCancellation']);
Route::post('/reject_cancellation', [OrderController::class, 'rejectCancellation']);
Route::match(['get','post'],'/create_order', [OrderController::class, 'CreateOrder']);
Route::match(['get','post'],'/create_order_stripe', [OrderController::class, 'CreateOrderStripe']);
Route::post('/save_requirement', [OrderController::class, 'SaveRequirement']);
Route::match(['get','post'],'/order_conversation', [OrderController::class, 'SendOrderMessage']);
Route::get('/manage-orders', [OrderController::class, 'manageOrders']);




Route::post('/change-password', [ProfileController::class, 'ChangePassword']);
Route::post('/save-billing-info', [ProfileController::class, 'SaveBilling']);
Route::post('/save-notificatoins-setting', [ProfileController::class, 'SaveNotificationSetting']);

Route::get('/help-center', [OrderController::class, 'HelpCenter']);
Route::post('/request-help', [OrderController::class, 'RequestHelp']);
Route::post('/deliver-work', [OrderController::class, 'DeliverWork']);

});
Route::get('/services/{url}', [ServiceController::class, 'index']);
Route::match(['get','post'],'/get_services', [ServiceController::class, 'get_services']);
Route::get('/{username}/{url}', [ServiceController::class, 'service_detail'])->name('service-details');
Route::get('/search', [ServiceController::class, 'search_service']);
Route::get('/services/{url}/{child_url}', [ServiceController::class, 'index']);
Route::post('/favorite_service/', [ServiceController::class, 'favoriteService']);
Route::get('send-sms-notification', [RegisterController::class, 'sendSmsNotificaition']);
