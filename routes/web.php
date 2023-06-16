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

Route::get('/', 'PublicControllers\Pages@homepage')->name('home');
Route::redirect('/home', '/');

Auth::routes(['verify'=>true]);
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('dashboard', 'PrivateControllers\Dashboards@index')->name('dashboard');


Route::group(['middleware' => ['auth','AdminRole'], 'prefix' => 'admin'], function() use ($router)
{

    Route::get('dashboard','PrivateControllers\Dashboards@admin');

    Route::resource('zones', 'AdminControllers\Zones');
    Route::resource('areas', 'AdminControllers\Areas');
    Route::resource('weights', 'AdminControllers\Weights');
    Route::resource('pricings', 'AdminControllers\Pricings')->only(['index', 'update']);

});


Route::group(['middleware' => ['auth','HubRole'], 'prefix' => 'hub'], function() use ($router)
{

    Route::get('dashboard','PrivateControllers\Dashboards@hub');

});


Route::group(['middleware' => ['auth','GroundTeamRole'], 'prefix' => 'ground-team'], function() use ($router)
{

    Route::get('dashboard','PrivateControllers\Dashboards@groundTeam');

});


Route::group(['middleware' => ['auth','SenderRole'], 'prefix' => 'sender'], function() use ($router)
{

    Route::get('dashboard','PrivateControllers\Dashboards@sender');

    Route::resource('parcels', 'Sender\Parcels')->except(['show']);
    Route::any('parcels/upload', 'Sender\Parcels@upload');
    
    Route::post('parcels/upload/preview', 'Sender\Parcels@insert');

    Route::get('pricing', 'Sender\Pricings@index');


});

