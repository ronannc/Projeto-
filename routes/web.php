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

        Route::resource('membroInferior', 'MembroInferiorController')->middleware('can:admin');
        Route::resource('peitoral', 'PeitoralController')->middleware('can:admin');
        Route::resource('biceps', 'BicepsController')->middleware('can:admin');
        Route::resource('triceps', 'TricepsController')->middleware('can:admin');
        Route::resource('costa', 'CostaController')->middleware('can:admin');
        Route::resource('ombro', 'OmbroController')->middleware('can:admin');
        Route::resource('exercicioTreino', 'ExercicioTreinoController')->middleware('can:admin');
        Route::resource('treino', 'TreinoController');
        Route::resource('cliente', 'ClienteController');

        Route::get('editMyAcount', 'ClienteController@editMyAcount')->name('editMyAcount');
        Route::get('myAcount', 'ClienteController@myAcount')->name('myAcount');
        Route::get('myCurrentTraining', 'TreinoController@myCurrentTraining')->name('myCurrentTraining');
 });
