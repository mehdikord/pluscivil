<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| created by Mehdi Kord (@mehdi_atwork)
|
*/
Route::get('test',function (){
 if (\auth()->check()){
     return 1;
 }else{
     return 00;
 }
});
Route::group(['middleware'=>['web']],function (){

    //Auth Routing
    Route::namespace('Auth')->group(function (){
        Route::post('login','LoginController@login')->name('login');
        Route::get('logout','LoginController@logout')->name('logout');
    });

    //Front Routing
    Route::namespace('Web')->group(function (){
        Route::get('/','PageController@index')->name('index');
    });

    //Management Routing
    Route::namespace('Management')->group(function (){
        Route::prefix('management')->group(function (){
            Route::get('login','PageController@login')->name('management_login');
            Route::get('dashboard','PageController@dashboard')->name('management_dashboard');

            //admin users
            Route::prefix('admins')->group(function (){
                Route::get('index','UserController@admins_index')->name('management_admins_index');
                Route::post('store','UserController@admins_store')->name('management_admins_store');
            });
        });
    });
});

