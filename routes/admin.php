<?php

/*
|--------------------------------------------------------------------------
| Web Admin Panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

app()->singleton('admin', function () {
		return 'admin';
	});

\L::Panel(app('admin'));/// Set Lang redirect to admin
\L::LangNonymous();// Run Route Lang 'namespace' => 'Admin',

Route::group(['prefix' => app('admin'), 'middleware' => 'Lang'], function () {

		Route::get('theme/{id}', 'Admin\Dashboard@theme');
		Route::group(['middleware' => 'admin_guest'], function () {

				Route::get('login', 'Admin\AdminAuthenticated@login_page');
				Route::post('login', 'Admin\AdminAuthenticated@login_post');

				Route::post('reset/password', 'Admin\AdminAuthenticated@reset_password');
				Route::get('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_final');
				Route::post('password/reset/{token}', 'Admin\AdminAuthenticated@reset_password_change');
			});
		/*
		|--------------------------------------------------------------------------
		| Web Routes
		|--------------------------------------------------------------------------
		| Do not delete any written comments in this file
		| These comments are related to the application (it)
		| If you want to delete it, do this after you have finished using the application
		| For any errors you may encounter, please go to this link and put your problem
		| phpanonymous.com/it/issues
		 */

		Route::group(['middleware' => 'admin:admin'], function () {
				//////// Admin Routes /* Start */ //////////////
				Route::get('/', 'Admin\Dashboard@home');
				Route::get('message', 'Admin\MessageController@index');
				Route::delete('message/delete/{id}', 'Admin\MessageController@destroy');
				Route::post('message/multi_delete', 'Admin\MessageController@multi_delete');
				Route::get('message/{id}', 'Admin\MessageController@show');
				Route::get('message-unwatched', 'Admin\MessageController@index');
				Route::any('logout', 'Admin\AdminAuthenticated@logout');
				Route::resource('admin', 'Admin\AdminController');
				Route::post('admin/multi_delete','Admin\AdminController@multi_delete'); 
				Route::resource('user','Admin\UserController'); 
				Route::post('user/multi_delete','Admin\UserController@multi_delete');
				Route::get('profile', 'Admin\AdminController@profile'); 
				Route::put('profile', 'Admin\AdminController@profilePost');
				Route::delete('profile/delete', 'Admin\AdminController@deleteAccount');
				Route::get('setting','Admin\SettingController@index'); 
				Route::get('setting/{id}/edit','Admin\SettingController@edit'); 
				Route::get('setting/{id}','Admin\SettingController@show'); 
				Route::put('setting/{id}','Admin\SettingController@update'); 
				Route::resource('building','Admin\BuildingController'); 
				Route::post('building/multi_delete','Admin\BuildingController@multi_delete'); 
				Route::get('building-{type}', 'Admin\BuildingController@index');
				Route::get('flat/{id}/activation', 'Admin\BuildingController@setActive');
				//////// Admin Routes /* End */ //////////////
			});

	});
