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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//index
Route::get('/index', 'IndexController@index');

Route::get('/home', 'HomeController@index')->name('home');


/**
 * 页面路由路径
 * @date: 2018年12月25日 下午3:48:16
 * @author: liudanqi
 */
Route::get('/otype', 'viewController@otype');
Route::get('/rtype', 'viewController@rtype');
Route::get('/database', 'viewController@database');
Route::get('/datasource', 'viewController@datasource');
Route::get('/ontologymap', 'viewController@ontologymap');
Route::get('/ontologyfus', 'viewController@ontologyfus');
Route::get('/taskallocation', 'viewController@taskallocation');
Route::get('/taskhis', 'viewController@taskhis');
Route::get('/safemanage', 'viewController@safemanage');