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
    return phpinfo();
});

Route::post('sms', 'Test\SmsController@index');

//Route::any('/wechat', 'WechatController@serve');
//会员商城入口重定向
Route::get('/', function () {
    return view('shop.loading');
});
Route::group(['prefix' => 'shop', 'middleware' => ['web', 'wechat.oauth:snsapi_userinfo']], function () {
    //首页
    Route::get('/', function () {
        return view('shop.loading');
    });
    Route::get('index', function () {
        $js = EasyWeChat::js();
        return view('shop.index', compact('js'));
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
    Route::get('reward', 'Front\UserController@reward');
    //狗环
    Route::get('dog', 'Front\DogController@index');
    Route::post('relate', 'Front\DogController@relate');
    Route::get('coin/dog', 'Front\CoinController@dog');

});

Route::get('juli', function () {
    return response()->redirectTo('jul');
});
Route::get('jul', function () {
    $js = EasyWeChat::js();
    return view('jl', compact('js'));
});

Route::get('suning/index', function () {
    $js = EasyWeChat::js();
    return view('suning.index', compact('js'));
});
Route::get('suning/end', function () {
    $js = EasyWeChat::js();
    return view('suning.index2', compact('js'));
});

Route::get('image/index', 'Image\IndexController@index');
