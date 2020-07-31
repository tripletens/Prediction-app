<?php

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
    return view('welcome');
});
Auth::routes(['/']);
Route::resource('tickets', 'TicketsController');

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'WelcomeController@about')->name('about');
Route::get('/strategy', 'WelcomeController@strategy')->name('strategy');
Route::get('/contact-us', 'WelcomeController@contact')->name('contact-us');

Route::get('/user/packages/view', 'GamesController@view')->name('view-packages');
Route::get('/user/games/view/free/{type}', 'GamesController@view_free');
Route::get('/user/games/view/paid/{type}', 'GamesController@view_paid');
Route::get('/user/games/view/{id}', 'GamesController@view_one')->name('view-one-game');
Route::get('/user/account/activate', 'AccountsController@activate')->name('activate-account');
Route::get('/user/ticket/open', 'TicketsController@open')->name('open-ticket');
Route::post('/user/ticket/save', 'TicketsController@store')->name('save-ticket');
Route::get('/user/ticket/view', 'TicketsController@view')->name('view-ticket');
Route::get('/user/profile', 'HomeController@profile')->name('user-profile');
Route::get('/user/profile/settings', 'HomeController@settings')->name('user-profile-settings');
Route::post('/user/profile/edit', 'ProfileController@update')->name('user-profile-edit');
//--------------payment routes ---------------
Route::get('/user/pay/{package}', 'PaymentController@show')->name('user-pay');
Route::any('/user/pay/process/{package_id}/{reference_no}', 'PaymentController@process_payment');
//------------------------end payment routes -------------------
Route::get('/user/payment-confirm/{package}', 'PaymentController@thanks')->name('user-thanks');
// Admin Routes ------------------------------
Route::get('/admin/login', 'AdminController@index')->name('admin-login');
// / admin / dashboard
Route::post('/admin/process-login', 'AdminController@login')->name('process-login');
Route::get('/admin/dashboard', 'AdminDashboardController@home')->name('admin-dashboard');
Route::get('/admin/users', 'AdminDashboardController@fetch_users')->name('admin-users');

Route::post('/admin/users/activate/{id}', 'AdminDashboardController@activate_user')->name('admin-activate-users');
Route::post('/admin/users/deactivate/{id}', 'AdminDashboardController@deactivate_user')->name('admin-deactivate-users');
Route::post('/admin/activate-game/{id}', 'GamesController@activate_game')->name('activate-game');
Route::post('/admin/deactivate-game/{id}', 'GamesController@deactivate_game')->name('deactivate-game');
Route::post('/admin/game/process_add', 'AdminDashboardController@process_add_game')->name('process-add');
Route::any('/admin/add-game', 'AdminDashboardController@add_game')->name('add-game');
Route::get('/admin/ticket/open', 'AdminDashboardController@open_ticket')->name('admin-open-ticket');
Route::get('/admin/ticket/view', 'AdminDashboardController@view_ticket')->name('admin-view-ticket');
Route::any('/admin/ticket/process', 'AdminDashboardController@process_ticket')->name('admin-process-ticket');
Route::any('/admin/ticket/reply/{id}', 'AdminDashboardController@reply_ticket')->name('admin-reply-ticket');
Route::any('/admin/ticket/reply/process/{id}', 'AdminDashboardController@process_reply_ticket')->name('process-reply-ticket');
Route::get('/admin/profile', 'AdminDashboardController@profile')->name('admin-profile');
Route::get('/admin/profile/settings', 'AdminDashboardController@profile_settings')->name('admin-profile-settings');
Route::post('/admin/profile/settings/process', 'AdminDashboardController@process_profile_settings')->name('admin-profile-edit');

Route::get('/admin/games/view/free/{type}', 'AdminDashboardController@view_free');
Route::get('/admin/games/view/paid/{type}', 'AdminDashboardController@view_paid');
Route::post('/admin/games/activate/{category}/{type}/{id}','AdminDashboardController@activate_game');
Route::post('/admin/games/deactivate/{category}/{type}/{id}', 'AdminDashboardController@deactivate_game');
Route::post('/admin/games/update_result/{category}/{type}/{id}', 'AdminDashboardController@update_result');
// ---------- strictly for tests ------------------
Route::get('/tests', 'WelcomeController@tests')->name('test');