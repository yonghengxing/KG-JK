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
Route::get('/taskallocation', 'viewController@taskallocation');
Route::get('/taskallocation/addtask', 'viewController@addtask');
Route::get('/taskhis', 'viewController@taskhis');
Route::get('/safemanage', 'viewController@safemanage');

/**
 * 图谱相关操作
 * @date: 2018年1月14日 下午17:21:16
 * @author: liudanqi
 */
Route::get('/schemagraph', 'viewController@schemagraph');
Route::get('/datagraph', 'viewController@datagraph');
Route::get('/taskgraph', 'viewController@taskgraph');
Route::get('/searchgraph', 'viewController@searchgraph');
Route::get('/checkgraph', 'viewController@checkgraph');
Route::get('/export', 'viewController@export');

// /**
//  * 数据配置相关操作
//  * @date: 2018年1月14日 下午17:21:16
//  * @author: liudanqi
//  */
// Route::get('/database', 'viewController@database');
// Route::get('/database/new', 'viewController@newDB');
// Route::get('/datasource', 'viewController@datasource');
// Route::get('/datasource/new', 'viewController@newDS');

/**
 * 融合配置相关操作
 * @date: 2018年1月10日 下午17:15:16
 * @author: liudanqi
 */
Route::get('/fuse/ontologyfus', 'viewController@ontologyfus');
Route::get('/fuse/ontologymap/fusmap', 'viewController@fusmap');
Route::get('/fuse/ontologymap', 'viewController@ontologymap');


/**
 * 实体(类)相关操作
 */
Route::get('/schema/list', 'SchemaController@schema_list');
Route::get('/schema/new', 'SchemaController@schema_new');
Route::get('/schema/auto', 'SchemaController@schema_new_auto');
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
Route::get('/entity/new/{sid}', 'EntityController@entity_new_select');
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
Route::get('/relation/auto', 'RelationController@relation_new_auto');
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

/**
 * Excel相关导入
 */
Route::get('/excel/export','ExcelController@export');
Route::get('/excel/import','ExcelController@import');

/**
 * 数据库和数据源的相关操作
 */
Route::get('/database/new', 'DatabaseController@addDB');
Route::post('/addDB_do', 'DatabaseController@addDB_do');
Route::get('/addDB_do', 'DatabaseController@addDB_do');
Route::get('/database', 'DatabaseController@database');
Route::get('/datasource', 'DatabaseController@datasource');
Route::get('/datasource/new', 'DatabaseController@add_dbSrc');
Route::post('/database/getDB/{select_type}', 'DatabaseController@getDB');
Route::post('/database/getDBtableMsg/{select_type}', 'DatabaseController@getDBtableMsg');
Route::post('/addDBSrc_do', 'DatabaseController@addDBSrc_do');
Route::get('/database/show', 'DatabaseController@showDB');


//数据库连接
Route::get('/database/db_connect','DatabaseController@db_connect');



//Excel导出 
Route::get('/excel/export','Member\MemberController@export')->name('/excel/export'); 
//Excel导入 
Route::get('/excel/import','Member\MemberController@import')->name('/excel/import');