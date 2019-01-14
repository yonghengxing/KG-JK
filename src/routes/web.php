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

Route::get('/template', 'viewController@template');
/**
 * 页面路由路径
 * @date: 2018年12月25日 下午3:48:16
 * @author: liudanqi
 */
Route::get('/otype', 'viewController@otype');
Route::get('/otype/addObject', 'viewController@addObject');
Route::get('/rtype', 'viewController@rtype');
Route::get('/rtype/addRtype', 'viewController@addRtype');
Route::get('/database', 'viewController@database');
Route::get('/database/addDB', 'viewController@addDB');
Route::get('/datasource', 'viewController@datasource');
Route::get('/taskallocation', 'viewController@taskallocation');
Route::get('/taskhis', 'viewController@taskhis');
Route::get('/safemanage', 'viewController@safemanage');

/**
 * 融合配置相关操作
 * @date: 2018年1月10日 下午17:15:16
 * @author: liudanqi
 */
Route::get('/fuse/ontologyfus', 'viewController@ontologyfus');
Route::get('/fuse/ontologymap', 'viewController@ontologymap');


/**
 * 本体(类)相关操作
 */
Route::get('/schema/list', 'SchemaController@schema_list');
Route::get('/schema/new', 'SchemaController@schema_new');
Route::post('/schema/new', 'SchemaController@schema_new_do');
Route::get('/schema/delete/{sid}', 'SchemaController@schema_delete');
Route::get('/schema/info/{sid}', 'SchemaController@schema_info');
Route::post('/schema/info/{sid}', 'SchemaController@schema_info_do');
Route::get('/schema/search/{text?}', 'SchemaController@schema_search');


/**
 *实体相关操作
 */
Route::get('/entity/list', 'EntityController@entity_list');
Route::get('/entity/new', 'EntityController@entity_new');
Route::post('/entity/new', 'EntityController@entity_new_do');
Route::get('/entity/delete/{eid}', 'EntityController@entity_delete');
Route::get('/entity/info/{eid}', 'EntityController@entity_info');
Route::post('/entity/info/{eid}', 'EntityController@entity_info_do');
Route::get('/entity/search/{text?}', 'EntityController@entity_search');


/**
 * 关系相关操作
 */

Route::get('/relation/list', 'RelationController@relation_list');
Route::get('/relation/new', 'RelationController@relation_new');
Route::post('/relation/new', 'RelationController@relation_new_do');
Route::get('/relation/delete/{rid}', 'RelationController@relation_delete');
Route::get('/relation/info/{rid}', 'RelationController@relation_info');
Route::post('/relation/info/{rid}', 'RelationController@relation_info_do');
Route::get('/relation/search/{text?}', 'RelationController@relation_search');

/**
 * 关系类型操作
 */

Route::get('/relationType/list', 'RelationTypeController@relationType_list');
Route::get('/relationType/new', 'RelationTypeController@relationType_new');
Route::post('/relationType/new', 'RelationTypeController@relationType_new_do');
Route::get('/relationType/delete/{tid}', 'RelationTypeController@relationType_delete');
Route::get('/relationType/info/{tid}', 'RelationTypeController@relationType_info');
Route::post('/relationType/info/{tid}', 'RelationTypeController@relationType_info_do');
Route::get('/relationType/search/{text?}', 'RelationTypeController@relationType_search');

