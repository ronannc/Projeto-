<?php

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


Route::middleware('auth:api')->group(function (){
    Route::get('biceps/{client_id}', 'BicepsController@exerciseByClient');
    Route::get('triceps/{client_id}', 'TricepsController@exerciseByClient');
    Route::get('back/{client_id}', 'BackController@exerciseByClient');
});

Route::get('breast/{client_id}', 'BreastController@exerciseByClient');





