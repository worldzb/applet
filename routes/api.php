<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getToken', 'QiniuController@getToken');
Route::get('/getFileInfo', 'QiniuController@getFileInfo');
Route::get('/getFodderList', 'QiniuController@getFodderList');
Route::post('/picUpload', 'QiniuController@picUpload');
Route::get('/checkPic','QiniuController@checkPic');
Route::delete('/fodder/{id}', 'QiniuController@deleteFodder');

Route::post('/goods', 'GoodsController@addGoods');
Route::get('/goods/{id}', 'GoodsController@getGoods');
Route::get('/goodList/{type}', 'GoodsController@getGoodsList');
Route::get('/goodNewList', 'GoodsController@getNewGoodsList');
Route::get('/main', 'GoodsController@main');