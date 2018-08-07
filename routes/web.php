<?php

/*
|--------------------------------------------------------------------------|
| Web Routes                                                               |
|--------------------------------------------------------------------------|
|                                                                          |
| Here is where you can register web routes for your application. These    |
| routes are loaded by the RouteServiceProvider within a group which       |
| contains the "web" middleware group. Now create something great!         |
|--------------------------------------------------------------------------|
*/

//Pages
Auth::routes();
Route::get('/', 'PageController@index')->name('page.home');
Route::get('about', 'PageController@getAbout')->name('page.about');
Route::get('contact', 'PageController@getContact')->name('page.contact');

//Campaigns
Route::resource('campaigns', 'CampaignController');


//Donations
Route::resource('donate', 'DonationController');

//User
Route::resource('user-profile','UserController');

//Admin
Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.home');
  Route::resource('/campaigns', 'Admin\AdminCampaignController',['names' => [
    'index' => 'admin.campaigns.index',
    'create' => 'admin.campaigns.create',
    'store' => 'admin.campaigns.store',
    'show' => 'admin.campaigns.show',
    'edit' => 'admin.campaigns.edit',
    'update' => 'admin.campaigns.update',
    'destroy' => 'admin.campaigns.destroy'
]]);
  Route::resource('/users', 'Admin\AdminUsersController',['names' => [
    'index' => 'admin.users.index',
    'create' => 'admin.users.create',
    'store' => 'admin.users.store',
    'show' => 'admin.users.show',
    'edit' => 'admin.users.edit',
    'update' => 'admin.users.update',
    'destroy' => 'admin.users.destroy'
]]);
  Route::resource('/donations', 'Admin\AdminDonationController',['names' => [
    'index' => 'admin.donations.index',
    'create' => 'admin.donations.create',
    'store' => 'admin.donations.store',
    'show' => 'admin.donations.show',
    'edit' => 'admin.donations.edit',
    'update' => 'admin.donations.update',
    'destroy' => 'admin.donations.destroy'
]]);
  Route::resource('/transactions', 'Admin\AdminTransactionController',['names' => [
    'index' => 'admin.transactions.index',
    'create' => 'admin.transactions.create',
    'store' => 'admin.transactions.store',
    'show' => 'admin.transactions.show',
    'edit' => 'admin.transactions.edit',
    'update' => 'admin.transactions.update',
    'destroy' => 'admin.transactions.destroy'
]]);

});


//Payments
// Route::get('/checkout', 'CheckoutController@checkout')->name('page.checkout');
// Route::post('/donate', 'CheckoutController@donate')->name('page.donate');
// Route::get('/thankyou','CheckoutController@success')->name('page.success');
