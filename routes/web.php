<?php

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


    Auth::routes();//login register
    Auth::routes(['verify'=>true]);

    Route::group(['middleware' => 'auth'], function () {
    //giriş yapıldıktan sonra gelicek roouterlar buraya yazılmalı
    //------------Admin Controller------------
    Route::get('/home', 'AdminController@index')->name('home');
    Route::get('/users', 'AdminController@indexView')->name('users');
    Route::post('/user-import', 'ExcelUploadController@userImport')->name('user-import');//excel user added
    Route::get('/user-export', 'ExcelDownloadController@userExport')->name('user-export');//excel user download

    Route::get('/update/{id}', 'AdminController@updateView')->where(array('id' => '[0-9]+'))->name('update');//id control
    Route::post('/update/{id}', 'AdminController@update')->where(array('id' => '[0-9]+'));//id control
    Route::get('/delete/{id}', 'AdminController@delete')->where(array('id' => '[0-9]+'));//id control
    Route::post('/create', 'AdminController@userCreate');

    //------------Content Controller------------
    Route::get('/pending', 'ContentController@pendingView');
    Route::get('/new', 'ContentController@newcontent');
    Route::post('/content-create', 'ContentController@contentCreate')->name('content-create');
    Route::get('/content-export', 'ExcelDownloadController@contentExport')->name('content-export');//excel content download

    });

    //Route::get('/home', 'HomeController@index')->name('home');
