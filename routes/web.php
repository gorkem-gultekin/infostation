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

//Route::get('/', function () {
//    return view('index');
//});
Route::get('/', 'HomeController@index');
Route::get('/content-post/{search_title}', 'HomeController@contentPost');
Route::get('/category/{category}', 'HomeController@categoryView');
Route::post('/bulletin', 'HomeController@bulletin');
Route::get('/contact', 'HomeController@contactView');
Route::post('/message', 'HomeController@contactMessage');
Route::post('/comment-create/{id}', 'HomeController@commentCreate')->where(array('id' => '[0-9]+'))->name('comment-create');//comment save
Route::get('/populer','HomeController@populerView');
Route::get('/forum','HomeController@forumView');
Route::post('/search/', 'HomeController@search')->name('search');

//Auth::routes(['verify' => true]); //for verify email
Route::get('/mail', function () {
    return view('email.register-mail');
});
Auth::routes();//login register

Route::group(['middleware' => 'auth'], function () {
    //giriş yapıldıktan sonra gelicek roouterlar buraya yazılmalı
    //------------Admin Controller------------
    Route::get('/admin', 'AdminController@index')->name('home');
    Route::get('/users', 'AdminController@indexView')->name('users');
    Route::post('/user-import', 'ExcelUploadController@userImport')->name('user-import');//excel user added
    Route::get('/user-export', 'ExcelDownloadController@userExport')->name('user-export');//excel user download
    Route::get('/update/{id}', 'AdminController@updateView')->where(array('id' => '[0-9]+'))->name('update');//id control
    Route::post('/update/{id}', 'AdminController@update')->where(array('id' => '[0-9]+'));//id control
    Route::get('/delete/{id}', 'AdminController@delete')->where(array('id' => '[0-9]+'));//id control
    Route::post('/create', 'AdminController@userCreate');
    Route::get('/admin-contact','AdminController@adminContact')->name('admin-contact');
    Route::get('/bulletin','AdminController@bulletinView')->name('bulletin');
    Route::get('/bulletin-members-delete/{id}','AdminController@bulletinMembersDelete')->name('bulletin-members-delete');

    Route::get('/deneme','AdminController@deneme');


    //------------Content Controller------------
    Route::get('/pending', 'ContentController@pendingView')->name('pending');//pending content page view
    Route::get('/published', 'ContentController@publishedView')->name('published-content');//published content page view
    Route::get('/new-content', 'ContentController@newcontentView')->name('new-content');//new content page view
    Route::get('/deleted-content', 'ContentController@deletedView')->name('deleted-content');//deleted content
    Route::post('/content-create', 'ContentController@contentCreate')->name('content-create');//added content
    Route::get('/content-export', 'ExcelDownloadController@contentExport')->name('content-export');//excel content download
    Route::get('/edit/{id}', 'ContentController@editView')->where(array('id' => '[0-9]+'));// content edit page view
    Route::post('/content-edit/{id}', 'ContentController@contentEdit')->where(array('id' => '[0-9]+'))->name('content-edit');
    Route::get('/content-published/{id}', 'ContentController@contentPublished')->where(array('id' => '[0-9]+'))->name('content-published');//content published updated is_aprrove
    Route::get('/content-delete/{id}', 'ContentController@contentDelete')->where(array('id' => '[0-9]+'))->name('content-delete');//content delete updated deleted_at
    Route::get('/content-hard-delete/{id}', 'ContentController@contenthardDelete')->where(array('id' => '[0-9]+'))->name('content-hard-delete');//content hard delete
    Route::get('/content-export', 'ExcelDownloadController@contentExport')->name('content-export');//excel contents download
    Route::post('/content-import', 'ExcelUploadController@contentImport')->name('content-import');//excel contents added


    //------------Comments------------
    Route::get('/comments', 'ContentController@commentsView')->name('comments-view');
    Route::get('/comments-edit/{id}', 'ContentController@commentsEdit')->name('comments-edit');
    Route::get('/comments-ok/{id}', 'ContentController@commentsOk')->name('comments-ok');
    Route::get('/comments-del/{id}', 'ContentController@commentsDel')->name('comments-del');
    Route::get('/comments-hard-del/{id}', 'ContentController@commentsHardDel')->name('comments-hard-del');
    Route::get('/comment/search','ContentController@commentSearch');//comments page contents search



});



//Route::get('/home', 'AdminController@index')->name('home');
