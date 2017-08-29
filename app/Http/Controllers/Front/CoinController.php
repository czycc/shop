<?php

namespace App\Http\Controllers\Front;

use App\Events\CoinChange;
use App\Models\Coin_log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop_user;
use App\Models\Relate;
use EasyWeChat\Foundation\Application;

class CoinController extends Controller
{
    public $js;

    /**
     * ConverseController constructor.
     * @param $app
     */
    public function __construct(Application $app)
    {
        $this->js = $app->js;
    }

    public function day()
    {
        //判断是否注册
        $user_info = session('wechat.oauth_user');
        $user = Shop_user::where('openid', $user_info->id)->first();
        if (is_null($user)) {
            return redirect('shop/user');
        }

        $quantity = config('vip.dayCoin');
        $today = Carbon::today();
        //判断是否已经签到
        if ($user->sign < $today) {
            $user->sign = Carbon::now();
            $user->coin += $quantity;
            $user->save();
            event(new CoinChange($user_info->id, $quantity, '每日签到', '+'));
            return redirect('shop/index')->with('sign', 'true');
        }

        return redirect('shop/index')->with('sign_error', 'true');
    }

    /**
     * 展示个人金币信息
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function log()
    {
        //判断是否注册
        $user_info = session('wechat.oauth_user');
        $user = Shop_user::where('openid', $user_info->id)->first();
        if (is_null($user)) {
            return redirect('shop/user');
        }

        $logs = Coin_log::where('openid', $user_info->id)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        $js = $this->js;
        return view('shop.makeGood', compact('user', 'logs','js'));
    }

    public function dog()
    {
        //判断是否注册
        $user_info = session('wechat.oauth_user');
        $user = Shop_user::where('openid', $user_info->id)->first();
        if (is_null($user)) {
            return redirect('shop/user');
        }
        //查找指定用户信息
        $relate = Relate::where('openid', $user_info->id)->first();

        $js = $this->js;

        if (is_null($relate)) {
            return view('shop.dog_step',compact('js'));
        }
        //如果今天没有兑换并且今日有同步步数
        if ($relate->day < Carbon::today() && $relate->machine->date >= Carbon::today()) {
            //更新兑换时间
            $coin = floor(($relate->machine->num) / 1000);
            $relate->day = Carbon::now();
            $relate->save();
            //更新金币数量
            $user->coin += $coin;
            $user->save();
            //录入日志
            event(new CoinChange($user_info->id, $coin, '步数兑换', '+'));

            return redirect('shop/dog')->with('day', 'true');
        }
        return redirect('shop/dog');
    }
}
