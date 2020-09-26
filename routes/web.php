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
    return view('index');
});
Route::get('/soon', function () {
    return view('soon');
});
Route::get('/mail',function (){return view('email.register-mail');});

Auth::routes();//login register
//Auth::routes(['verify' => true]); //for verify email

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
    Route::get('/pending', 'ContentController@pendingView');//pending content page view
    Route::get('/published', 'ContentController@publishedView')->name('published-content');//published content page view
    Route::get('/new-content', 'ContentController@newcontentView')->name('new-content');//new content page view
    Route::get('/deleted-content','ContentController@deletedView')->name('deleted-content');//deleted content
    Route::post('/content-create', 'ContentController@contentCreate')->name('content-create');//added content
    Route::get('/content-export', 'ExcelDownloadController@contentExport')->name('content-export');//excel content download
    Route::get('/edit/{id}','ContentController@editView')->where(array('id'=>'[0-9]+'));// content edit page view
    Route::post('/content-edit/{id}','ContentController@contentEdit')->where(array('id'=>'[0-9]+'))->name('content-edit');
    Route::get('/content-published/{id}','ContentController@contentPublished')->where(array('id'=>'[0-9]+'))->name('content-published');//content published updated is_aprrove
    Route::get('/content-delete/{id}', 'ContentController@contentDelete')->where(array('id'=>'[0-9]+'))->name('content-delete');//content delete updated deleted_at
    Route::get('/content-hard-delete/{id}','ContentController@contenthardDelete')->where(array('id'=>'[0-9]+'))->name('content-hard-delete');//content hard delete

});



//Route::get('/home', 'HomeController@index')->name('home');
