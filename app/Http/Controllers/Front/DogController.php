<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop_user;

class DogController extends Controller
{
    public function index()
    {
        //判断是否注册
        $user_info = session('wechat.oauth_user');
        $user = Shop_user::where('openid', $user_info->id)->first();
        if (is_null($user)) {
            return redirect('shop/user');
        }

        return view('shop.dog_step');
    }

}
