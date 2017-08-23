<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop_user;

class UserController extends Controller
{

    /**
     * 用户信息页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $info = session('wechat.oauth_user');
        $user = Shop_user::where('openid', $info->id)->first();
        if (is_null($user)) {
            return view('shop.personal_info');
        }
        return view('shop.personal_info', compact('user'));
    }
}
