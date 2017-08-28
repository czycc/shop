<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop_user;
use EasyWeChat\Foundation\Application;

class DrawController extends Controller
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

    public function index()
    {
        //判断是否注册
        $userInfo = session('wechat.oauth_user');
        $user = Shop_user::where('openid', $userInfo->id)->first();
        if (is_null($user)) {
            return redirect('shop/user');
        }

        return view('shop.gift',compact('user', 'js'));
    }
}
