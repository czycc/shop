<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop_user;
use EasyWeChat\Foundation\Application;

class UserController extends Controller
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


    /**
     * 用户信息页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $info = session('wechat.oauth_user');
        $user = Shop_user::where('openid', $info->id)->first();
        if (is_null($user)) {
            return view('shop.personal_info','js');
        }
        return view('shop.personal_info', compact('user','js'));
    }

    public function reward()
    {
        $info = session('wechat.oauth_user');
        $user = Shop_user::where('openid', $info->id)->first();
        if (is_null($user)) {
            return view('shop.personal_info', 'js');
        }
        $rewards = Order::select('type')
            ->where('shop_user_id', $user->id)
            ->orderBy('created_at','desc')
            ->limit(4)
            ->get();
        return view('shop.mygift',compact('rewards','js'));
    }
}
