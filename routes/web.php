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

Route::get('/', 'UserController@profile');
Route::get('/logout', 'UserController@logout');
Route::post('/contacts/add', 'UserController@add_contact');
Route::get('/contacts/remove/{id}', 'UserController@remove_contact');

Route::post('/profile/save', 'UserController@save_profile');
Route::post('/send', 'UserController@review_letter');
Route::get('/letter/delete/{letter_id}', 'UserController@delete_letter');
Route::get('/compose/continue/{letter_id}', 'UserController@continue_draft');
Route::post('/compose/search', 'UserController@search');
Route::post('/contacts/search', 'UserController@contact_search');
Route::get('/profile', 'UserController@profile');
Route::get('/letter', 'UserController@letter');
Route::get('/compose', 'UserController@compose');
Route::get('/contacts', 'UserController@contacts');
Route::get('/history', 'UserController@history');
Route::get('/credits', 'UserController@credits');
Route::get('/review', 'UserController@review');
Route::get('/sent', 'UserController@sent');
Route::get('/tracker', 'UserController@tracker');

Auth::routes();
