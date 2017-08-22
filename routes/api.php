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

Route::post('shop/step', 'Api\MachineController@update');

//礼品抽奖接口
Route::group(['prefix'=>'shop'],function (){
    Route::post('draw/spend','Api\DrawController@draw');
    Route::post('draw/coin', 'Api\DrawController@coin');
    Route::post('draw/ticket', 'Api\DrawController@ticket');
    Route::post('draw/reward', 'Api\DrawController@reward');
});