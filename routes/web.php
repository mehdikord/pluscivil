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

});
Route::group(['middleware'=>['web']],function (){

    //Auth Routing
    Route::namespace('Auth')->group(function (){
        Route::post('login','LoginController@login')->name('login');
        Route::get('logout','LoginController@logout')->name('logout');
        Route::post('/register-send','RegisterController@register')->name('register-send');
    });

    //Front Routing
    Route::namespace('Web')->group(function (){
        Route::get('/','PageController@index')->name('index');
        Route::get('/login','PageController@login')->name('front_login');
        Route::get('/register','PageController@register')->name('register');

        //file store
        Route::get('store','PageController@file_store')->name('front.file.store');
        Route::get('store/file/{file}','PageController@show_file')->name('front.file.store.show');
        Route::get('store/file/download/free/{file}','FileController@download_free')->name('front.file.store.download.free');

        //profile
        Route::prefix('profile')->group(function (){
            Route::get('dashboard','ProfileController@dashboard')->name('front.profile.dashboard');
            Route::get('files','ProfileController@files')->name('front.profile.files');
            Route::get('files/request/download/{file}','ProfileController@files_request_download')->name('front.profile.files.request.download');
        });

        //Services
        Route::prefix('service')->group(function (){
            Route::get('{service}','ServiceController@show')->name('front.service.show');
            Route::get('request/order/{service}','ServiceController@request_order')->name('front.service.request.order');
            Route::post('request/order/store/{service}','ServiceController@request_order_store')->name('front.service.request.order.store');

        });

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
                Route::post('update/{admin}','UserController@admins_update')->name('management_admins_update');
                Route::get('delete/{admin}','UserController@admins_delete')->name('management_admins_delete');
            });

            //Services
            Route::prefix('services')->group(function (){
                Route::get('index','ServiceController@index')->name('manager_service_index');
                Route::get('create','ServiceController@create')->name('manager_service_create');
                Route::post('store','ServiceController@store')->name('manager_service_store');
                Route::get('edit/{service}','ServiceController@edit')->name('manager_service_edit');
                Route::post('update/{service}','ServiceController@update')->name('manager_service_update');
                Route::get('delete/{service}','ServiceController@delete')->name('manager_service_delete');
            });

            //Files store
            Route::prefix('files')->group(function (){
                Route::get('index','FileController@index')->name('manager_file_index');
                Route::get('create','FileController@create')->name('manager_file_create');
                Route::post('store','FileController@store')->name('manager_file_store');
                Route::get('edit/{file}','FileController@edit')->name('manager_file_edit');
                Route::post('update/{file}','FileController@update')->name('manager_file_update');
                Route::get('active/{file}','FileController@active')->name('manager_file_active');
                Route::get('special/{file}','FileController@active')->name('manager_file_special');
                Route::get('download/{file}','FileController@download')->name('manager_file_download');
                Route::post('add/image/{file}','FileController@add_image')->name('manager_file_add_image');
                Route::get('delete/image/{image}','FileController@delete_image')->name('manager_file_delete_image');
            });

            //Settings
            Route::prefix('settings')->group(function (){
                Route::prefix('faqs')->group(function (){
                    Route::get('index','FaqController@index')->name('management_settings_faq_index');
                    Route::post('store','FaqController@store')->name('management_settings_faq_store');
                    Route::post('update/{faq}','FaqController@update')->name('management_settings_faq_update');
                    Route::get('delete/{faq}','FaqController@delete')->name('management_settings_faq_delete');
                    Route::get('change/{faq}','FaqController@change')->name('management_settings_faq_change');

                });
            });

            //Requests
            Route::prefix('requests')->group(function (){
                Route::get('new','RequestController@new')->name('admin_requests_new');
            });



        });
    });
});

