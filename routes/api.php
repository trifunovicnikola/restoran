<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware(['cors'])->group(function () {

    Route::get('/desks', 'deskController@show');


    Route::get('/desk/{id}', 'deskController@showId');
    Route::delete('/deskDel/{id}', 'deskController@delDesk');


    Route::get('/food', 'foodController@show');
    Route::get('food/{id}', 'foodController@showById');
    Route::post('addFood', 'foodController@addFood');
    Route::post('addDesk', 'deskController@addDesk');

    Route::delete('/foodDel/{id}', 'foodController@delete');
    Route::post('/editFood/{id}', 'foodController@editFood');

    Route::get('/restoran', 'restoranController@show');
    Route::post('postReservationAdmin', 'reserveDateController@setReservationAdmin');
    Route::post('postReservationUser', 'reserveDateController@setReservationUser');
    Route::delete('reservationDel', 'reserveDateController@delDesk');
});
Route::post('/register','AuthController@register');
Route::post('/login','AuthController@login');

Route::middleware('auth:sanctum')->group(function ()
{
    Route::get('/user','AuthController@user');
    Route::post('/logout', 'AuthController@logout');
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
