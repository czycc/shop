<?php

namespace App\Http\Controllers\Front;

use App\Events\CoinChange;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop_user;

class CoinController extends Controller
{
    public function day()
    {
        //判断是否注册
        $user_info = session('wechat.oauth_user');
        $user = Shop_user::where('openid',$user_info->id)->first();
        if (isEmpty($user)){
            return redirect('shop/users/create');
        }

        $quantity = config('vip.dayCoin');
        $today = Carbon::today();

        //判断是否已经签到
        if ($user->sign < $today){
            $user->sign = Carbon::now();
            $user->coin += $quantity;
            $user->save();
            event(new CoinChange($user_info->id, $quantity, '日常签到', '获取'));
        }

        return '已经签到';
    }
}
