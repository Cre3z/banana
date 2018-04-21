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



Route::get('/mailable', function () {
    $guest = App\Guest::where('email', 'admin@example.com')->get();
    return new App\Mail\GuestInvite($guest);
});

Route::get('/{token}', 'HomeController@getGuest')->name('guests_invite_token');
Route::get('/{event_id}/{token}', 'HomeController@getEvent')->name('guests_events');
Route::get('/guests_rsvp/{token}', 'HomeController@guestRSVP')->name('guests_rsvp');
Route::post('/contact', 'HomeController@contactUs')->name('contact_us');

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
    Route::get('/guests/{id}', 'GuestsController@edit')->name('guests_edit');
    Route::post('/guests/{id}', 'GuestsController@update')->name('guests_edit_post');
    Route::post('/guests/couple/{id}', 'GuestsController@updateCouple')->name('guests_edit_post_couple');

    Route::get('/events', 'EventController@index')->name('events');
    Route::get('/events/json', 'EventController@json')->name('events_json');
    Route::post('/events/delete', 'EventController@delete')->name('events_delete');
    Route::post('/events/todo', 'EventController@todo')->name('events_todo');
    Route::post('/events/unlink', 'EventController@unlink')->name('events_unlink');
    Route::post('/events/comments', 'EventController@comments')->name('events_comments');
    Route::get('/events/add', 'EventController@add')->name('events_add');
    Route::post('/events/add', 'EventController@addPost')->name('events_add_post');
    Route::get('/events/{title}', 'EventController@view')->name('events_view');
    Route::get('/events/update/{title}', 'EventController@update')->name('events_update');
    Route::post('/events/update/{title}', 'EventController@updatePost')->name('events_update_post');

    Route::get('/todo',  'TodoController@index');
    Route::post('/todo/new',  'TodoController@newList');
    Route::post('/todo/delete',  'TodoController@deleteList');
    Route::post('/todo/status',  'TodoController@status');
    Route::post('/todo/entry',  'TodoController@checked');
    Route::post('/todo/entry/update',  'TodoController@update');
    Route::post('/todo/entry/new',  'TodoController@new');
    Route::post('/todo/entry/delete',  'TodoController@delete');

    Route::get('/email-scheduler',  'EmailScheduler@indexView');
    Route::get('/add-email',      'EmailScheduler@addView');
    Route::post('/add-email',      'EmailScheduler@create');
    Route::post('/remove-email',      'EmailScheduler@delete');
    Route::resource('/emails',      'EmailScheduler');

    Route::get('/users',  'UserController@index');
    Route::get('/add-user',  'UserController@addView');
    Route::get('/users_json',  'UserController@indexJSON');
    Route::post('/add-user',  'UserController@add');
    Route::post('/deactivate',  'UserController@deactivate');

    Route::get('/logout',  'UserController@logout');
    Route::get('/register',  'HomeController@index');

});
