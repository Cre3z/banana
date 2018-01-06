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

Route::group(['middleware' => 'admin'], function() {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/guests', 'GuestsController@index')->name('guests');
    Route::get('/guests_add', 'GuestsController@add')->name('guests_add');
    Route::post('/guests_add', 'GuestsController@addPost')->name('guests_add_post');
    Route::post('/guests_add_couple', 'GuestsController@addPostCouple')->name('guests_add_couple_post');
    Route::get('/guests_all', 'GuestsController@all')->name('guests_all');
    Route::get('/guests_all_json', 'GuestsController@allJSON')->name('guests_all_json');
    Route::get('/guests_invited', 'GuestsController@invited')->name('guests_invited');
    Route::get('/guests_invited_json', 'GuestsController@invitedJSON')->name('guests_invited_json');
    Route::get('/guests_rsvp', 'GuestsController@rsvp')->name('guests_rsvp');
    Route::get('/guests_rsvp_json', 'GuestsController@rsvpJSON')->name('guests_rsvp_json');
    Route::get('/guests_pending', 'GuestsController@pending')->name('guests_pending');
    Route::get('/guests_pending_json', 'GuestsController@pendingJSON')->name('guests_pending_json');
    Route::post('/guests_send', 'GuestsController@guestsSend')->name('guests_send');

    Route::get('/email-scheduler',  'EmailScheduler@indexView');
    Route::get('/add-email',      'EmailScheduler@addView');
    Route::post('/add-email',      'EmailScheduler@create');
    Route::resource('/emails',      'EmailScheduler');

});
