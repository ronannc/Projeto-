<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
});

Auth::routes();

Route::group([
    'middleware' => [
        'auth',
    ]
],
    function () {
        Route::get('/home', 'HomeController@index')->name('home');

//        Route::resource('membroInferior', 'MembroInferiorController')->middleware('can:admin');
        Route::resource('membroInferior', 'MembroInferiorController');
        Route::resource('peitoral', 'PeitoralController');
        Route::resource('biceps', 'BicepsController');
        Route::resource('triceps', 'TricepsController');
        Route::resource('costa', 'CostaController');
        Route::resource('ombro', 'OmbroController');
        Route::resource('exercicioTreino', 'ExercicioTreinoController');
        Route::resource('treino', 'TreinoController');
        Route::resource('cliente', 'ClientController');

//        Route::get('editMyAcount', 'ClientController@editMyAcount')->name('editMyAcount');
//        Route::get('myAcount', 'ClientController@myAcount')->name('myAcount');
//        Route::get('myCurrentTraining', 'TreinoController@myCurrentTraining')->name('myCurrentTraining');
 });
