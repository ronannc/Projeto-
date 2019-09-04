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

Route::get('/', 'UserController@welcome');

Auth::routes();

Route::group([
    'middleware' => [
        'auth',
    ]
],
    function () {

        Route::get('/home', 'HomeController@index')->name('home');

        Route::resource('lower-member', 'LowerMemberController');
        Route::resource('breast', 'BreastController');
        Route::resource('biceps', 'BicepsController');
        Route::resource('triceps', 'TricepsController');
        Route::resource('back', 'BackController');
        Route::resource('shoulder', 'ShoulderController');
        Route::resource('workout', 'WorkoutController');
        Route::resource('client', 'ClientController');
        Route::resource('workout-mode', 'WorkoutModeController');
        Route::resource('company', 'CompanyController');
        Route::resource('physical-assessment', 'PhysicalAssessmentController');
        Route::resource('user', 'UserController');

 });
