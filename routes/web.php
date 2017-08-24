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
//会员商城入口重定向
Route::get('/', function () {
    return 'coming soon';
});
Route::group(['prefix' => 'shop', 'middleware' => ['web', 'wechat.oauth:snsapi_userinfo']], function () {
    //首页
    Route::get('/', function () {
        return view('shop.loading');
    });
    Route::get('index',function (){
        return view('shop.index');
    });

    //相关金币
    Route::get('coin', 'Front\CoinController@log');
    Route::get('coin/day', 'Front\CoinController@day');
    //用户信息
    Route::get('user', 'Front\UserController@index');
    //优惠券
    Route::get('ticket', 'Front\TicketController@show');
    //抽奖
    Route::get('draw', 'Front\DrawController@index');
    //狗环
    Route::get('dog', 'Front\DogController@index');
    Route::post('rank', function (){
        return view('shop.rank');
    });
});