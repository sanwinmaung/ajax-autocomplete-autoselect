<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/','SearchController@index');
Route::resource('address', 'AddressController');
Route::resource('user-info', 'UserInfoController');

// Route::get('township/search-by-address', 'AddressController@townshipsByAddress');
Route::get('auto-search/township-by-city', 'AddressController@searchTownshipByCity');
Route::get('auto-search/address', 'AddressController@searchAddress');
Route::get('auto-search/city-by-address', 'AddressController@searchCityByAddress');
// Route::get('autocomplete', 'AddressController@search');