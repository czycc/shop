<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop_user;

class DrawController extends Controller
{
    public function index()
    {
        //判断是否注册
        $userInfo = session('wechat.oauth_user');
        $user = Shop_user::where('openid', $userInfo->id)->first();
        if (isEmpty($user)) {
            return redirect('shop/users/create');
        }

        return '抽奖界面';
    }

    public function draw()
    {

    }
}
