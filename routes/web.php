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
        'invalidateIfBlocked'
    ]
],
    function () {

        Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
        Route::view('admin/horizon', 'admin.horizon')->name('horizon');
        Route::get('/home', 'HomeController@index')->name('home');

        Route::resource('lower-members', 'LowerMemberController');
        Route::resource('breasts', 'BreastController');
        Route::resource('biceps', 'BicepsController');
        Route::resource('triceps', 'TricepsController');
        Route::resource('backs', 'BackController');
        Route::resource('shoulders', 'ShoulderController');
        Route::resource('workouts', 'WorkoutController');
        Route::get('workouts/{id}/editExercicio', 'WorkoutController@editExercicio')->name('editExercicio');
        Route::post('workouts/{id}/editExercicio/store', 'WorkoutController@editExercicioStore')->name('editExercicio.store');
        Route::get('workouts/{id}/calcIdealWeight', 'WorkoutController@calcIdealWeight')->name('calcIdealWeight');
        Route::put('workouts/{id}/calcIdealWeight/store', 'WorkoutController@calcIdealWeightStore')->name('calcIdealWeight.store');
        Route::resource('clients', 'ClientController');
        Route::resource('workout-modes', 'WorkoutModeController');
        Route::resource('companies', 'CompanyController');
        Route::resource('physical-assessments', 'PhysicalAssessmentController');
        Route::resource('users', 'UserController');
        Route::get('users/online', 'UserController@online')->name('users.online');
        Route::resource('audits', 'AuditController');
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
        Route::resource('goals', 'GoalController');
        Route::resource('managers', 'ManagerController');

        Route::group(['prefix' => 'notifications'],
            function () {
                Route::get('', 'NotificationController@index')->name('notifications.index');
                Route::get('visualize-all', 'NotificationController@visualizeAll')->name('visualizeAll');
                Route::get('visualize/{id}', 'NotificationController@visualize')->name('visualize');
            });

    });
