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

routecontroller('/','HomeController');

Route::group(['prefix' => 'admin'], function(){
	Route::namespace('Auth\Admin')->name('admin.')->group(function(){
		Route::get('/login','LoginController@showLoginForm')->name('login');
		Route::post('/login','LoginController@login');
		Route::post('/logout','LoginController@logout')->name('logout');

		Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
		Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

		Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
		Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

	});

	Route::group(['middleware' => 'auth:admin'], function () {
		routecontroller('/','DashboardController');
		routecontroller('json','DataController');
		routecontroller('data','AdminsController');
		routecontroller('students','StudentsController');
		routecontroller('rombels','RombelsController');
		routecontroller('spp','SppController');
		routecontroller('transactions','TransactionsController');
		routecontroller('invoice','InvoiceController');
		routecontroller('settings','SettingsController');
		routecontroller('notifications','NotificationsController');
		routecontroller('log','ActivityController');
		routecontroller('test','TestingController');
	});
});

Auth::routes(['register' => false]);
Route::group(['middleware' => 'auth'], function () {
	routecontroller('dashboard','UsersDashboardController');
	routecontroller('transactions','UsersTransactionController');
	routecontroller('history','UsersHistoryController');
	routecontroller('user','UsersController');
});