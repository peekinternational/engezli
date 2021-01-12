<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('frontend.index');
});
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
Route::get('/forgot-password', function () {
    return view('frontend.forgot-password');
});
Route::get('/login', function () {
    return view('frontend.login');
});
Route::get('/register', function () {
    return view('frontend.register');
});
Route::get('/messages', function () {
    return view('frontend.messages');
});
Route::get('/gig-detail', function () {
    return view('frontend.gig-detail');
});
Route::get('/gigs', function () {
    return view('frontend.gigs');
});
Route::get('/profile', function () {
    return view('frontend.profile');
});
