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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('account')->group(function(){
	Route::post('/create','AccountController@create')->name('account-create');
});

Route::prefix('dashboard')->group(function(){
	Route::get('/','DashboardController@index')->name('dashboard-index');
	Route::get('/branch','BranchController@index')->name('dashboard-branch');
	Route::get('/branch/create','BranchController@create')->name('dashboard-branch-create');
	Route::post('/branch/store','BranchController@store')->name('dashboard-branch-store');
	Route::get('/branch/{id}/edit','BranchController@edit')->name('dashboard-branch-edit');
	Route::post('/branch/{id}/update','BranchController@update')->name('dashboard-branch-update');
	Route::post('/branch/{id}/destroy','BranchController@destroy')->name('dashboard-branch-destroy');
	Route::get('/branch/import','BranchController@import')->name('dashboard-branch-import');
	Route::post('/branch/import','BranchController@importBranch')->name('dashboard-branch-import-post');

	Route::get('/district','DistrictController@index')->name('dashboard-district');
	Route::get('/district/create','DistrictController@create')->name('dashboard-district-create');
	Route::post('/district/store','DistrictController@store')->name('dashboard-district-store');
	Route::get('/district/{id}/edit','DistrictController@edit')->name('dashboard-district-edit');
	Route::post('/district/{id}/update','DistrictController@update')->name('dashboard-district-update');
	Route::get('/district/{district}/remove','DistrictController@remove')->name('dashboard-district-remove');
	Route::post('/district/{id}/destroy','DistrictController@destroy')->name('dashboard-district-destroy');

	Route::get('/commune','CommuneController@index')->name('dashboard-commune');
	Route::get('/commune/create','CommuneController@create')->name('dashboard-commune-create');
	Route::post('/commune/store','CommuneController@store')->name('dashboard-commune-store');
	Route::get('/commune/{commune}/edit','CommuneController@edit')->name('dashboard-commune-edit');
	Route::post('/commune/{commune}/update','CommuneController@update')->name('dashboard-commune-update');
	Route::post('/commune/{commune}/destroy','CommuneController@destroy')->name('dashboard-commune-destroy');

	Route::get('/location','LocationController@index')->name('dashboard-location');
	Route::get('/location/create','LocationController@create')->name('dashboard-location-create');
	Route::post('/location/store','LocationController@store')->name('dashboard-location-store');
	Route::get('/location/{location}/edit','LocationController@edit')->name('dashboard-location-edit');
	Route::post('/location/{location}/update','LocationController@update')->name('dashboard-location-update');
	Route::post('/location/{location}/destroy','LocationController@destroy')->name('dashboard-location-destroy');

	Route::get('/village','VillageController@index')->name('dashboard-village');
	Route::get('/village/create','VillageController@create')->name('dashboard-village-create');
	Route::post('/village/store','VillageController@store')->name('dashboard-village-store');
	Route::get('/village/{village}/edit','VillageController@edit')->name('dashboard-village-edit');
	Route::post('/village/{village}/update','VillageController@update')->name('dashboard-village-update');
	Route::post('/village/{village}/destroy','VillageController@destroy')->name('dashboard-village-destroy');

	Route::get('/customer','CustomerController@index')->name('dashboard-customer');
	Route::get('/customer/create','CustomerController@create')->name('dashboard-customer-create');
	Route::post('/customer/store','CustomerController@store')->name('dashboard-customer-store');
	Route::get('/customer/{customer}/edit','CustomerController@edit')->name('dashboard-customer-edit');
	Route::post('/customer/{customer}/update','CustomerController@update')->name('dashboard-customer-update');
	Route::post('/customer/{customer}/destroy','CustomerController@destroy')->name('dashboard-customer-destroy');


});

Route::get('/account/create','CustomerController@createAccount')->name('create-account');
Route::post('/account/front-store','CustomerController@frontStore')->name('account-front-store');
Route::get('/account/{customer}/created','CustomerController@accountCreated')->name('account-created-page');
Route::get('/account/{account}','CustomerController@showAccount')->name('show-account');
Route::post('/account/search/','CustomerController@searchAccount')->name('search-account');

Route::post('/account/identify-check/{any}','CustomerController@identifyCheck')->name('account-identify-check');
Route::post('/account/email-check/{any}','CustomerController@identifyEmail')->name('account-email-check');
Route::post('/account/phone-check/{any}','CustomerController@identifyPhone')->name('account-email-check');
Route::post('/account/dob-check/{any}','CustomerController@dobCheck')->name('account-dob-check');

Route::post('/account/province-change/{any}','CustomerController@provinceDistrictGet')->name('account-privince-get-district');
Route::post('/account/province-district/{any}','CustomerController@provinceCommuneGet')->name('account-district-get-commune');
Route::post('/account/province-commune/{any}','CustomerController@provinceVilageGet')->name('account-commune-get-vilage');

Route::get('/{locale}',function($locale){
	Session::put('locale',$locale);
	return redirect()->back();
});