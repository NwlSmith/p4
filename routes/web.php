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

/*Route::get('/', function () {
    return view('index');
});*/

Route::view('/', 'index');

Auth::routes();

Route::get('/show-login-status', function () {
    $user = Auth::user();

    if ($user) {
        dump('You are logged in.', $user->toArray());
    } else {
        dump('You are not logged in.');
    }

    return;
});

/*
    * create game C
    * edit game
    * update game U
    * delete game yes if draw?
    * index - show players and games
    * show game R
 *
 */
Route::group(['middleware' => 'auth'], function () {
    # Create a game
    Route::post('/', 'HomeController@store');

    Route::get('/', 'HomeController@index');

    # View a game
    Route::get('/{id}', 'HomeController@show');

    # Edit a game
    Route::get('/{id}/edit', 'HomeController@edit');
    Route::put('/{id}', 'HomeController@update');
});