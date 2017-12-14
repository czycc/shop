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

//狗环更新步数接口
Route::post('shop/step', 'Api\MachineController@update');

//会员商城分享次数统计
Route::get('shop/share', 'Api\ShopController@share');

//礼品抽奖接口
//    Route::post('draw/spend','Api\DrawController@draw');
Route::post('draw/coin', 'Api\DrawController@coin');
Route::post('draw/ticket', 'Api\DrawController@ticket');
Route::post('draw/reward', 'Api\DrawController@reward');

//用户注册接口
Route::post('user/info', 'Api\ShopController@register');

//交换数据
Route::get('shop/data', 'Api\ShopController@data');

