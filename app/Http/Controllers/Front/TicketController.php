<?php

namespace App\Http\Controllers\Front;

use App\Models\Shop_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     *优惠券显示
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show()
    {
        $userInfo = session('wechat.oauth_user');
        $user = Shop_user::where('openid',$userInfo->id)->tickets()->get();
        if (isEmpty($user)){
            return redirect('shop/users/create');
        }
        dd($user);
    }
}
