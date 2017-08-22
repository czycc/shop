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



Route::get('/test', function () {
    return redirect('shop/users/create');
});

Route::post('sms', 'Test\SmsController@index');

//Route::any('/wechat', 'WechatController@serve');

Route::get('/', function () {
    return redirect('shop');
});
Route::group(['prefix' => 'shop', 'middleware' => ['web', 'wechat.oauth']], function () {
    //首页
    Route::get('/', function () {
        return 'coming soon';
    });
    //相关金币
    Route::get('/coin/day', 'Front\CoinController@day');
    Route::get('coin/log', 'Front\CoinController@log');
    //相关用户
    Route::get('/users/create', 'Front\UserController@create');
    Route::post('/users', 'Front\UserController@store');
    Route::get('users/edit', 'Front\UserController@edit');
    Route::post('users/update','Front\UserController@update');
    Route::get('users/show', 'Front\UserController@show');
    //优惠券
    Route::get('tickets/show', 'Front\TicketController@show');
    //抽奖

});