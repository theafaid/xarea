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

Route::get('/', 'HomeController@welcomePage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/* set language */
Route::get('lang/{lang}', function($lang){
	session()->has('lang') ? session()->forget('lang') : '' ; 
	$lang == 'en' ? session()->put('lang', 'en') : session()->put('lang', 'ar');
	return back();
});
/* end set language */
Route::get('flat/{id}', 'HomeController@single');
//////////////Contact Us /////////////////////////
Route::get('contact', function(){ 
	return view('contact');
});
Route::post('contact', 'MessageController@contact');
///////////// Add New Flat Routs ///////////////
Route::get('new', 'HomeController@addNew');
Route::post('new', 'HomeController@addNewPost');
////////////// Profile Page ///////////
Route::get('profile', 'HomeController@profile');
Route::post('profile', 'HomeController@profilePost');
////////////// User Ads Page //////////////
Route::get('profile/ads', 'HomeController@userAds');
/////////// Search For All Rent or Ownership Flats ////////////
Route::get('flats/{type}', 'HomeController@rentSearch');
// Advanced Searching //
Route::get('search/flats', 'HomeController@search');
///////// get information about flat using ajax //////////////
Route::get('ajax/getFlatInfo/{id}', 'HomeController@getFlatInfo');
/////// Edit Flat /////////////
Route::get('edit/flat/{id}', 'HomeController@editFlat');
Route::put('edit/flat/{id}', 'HomeController@editFlatPost');