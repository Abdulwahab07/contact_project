<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/' , function (){
    return view('welcom');
});

Route::post('groups/store' , ['uses' => 'GroupsController@store' , 'as' => 'groups.store']);
Route::get('contacts/autocomplete' , ['uses' => 'ContactsController@autocomplete' , 'as' => 'contacts.autocomplete']);
Route::get('groups','ContactsController@groups');
Route::resource('contacts', 'ContactsController');





/*

<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|


Route::get('/', function () {
    return view('welcome');
});

Route::resource('contacts', 'ContactsController');

*/
