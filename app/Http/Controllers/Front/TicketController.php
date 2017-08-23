<?php

namespace App\Http\Controllers\Front;

use App\Models\Shop_user;
use App\Models\Shop_user_ticket;
use App\Models\Ticket;
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
        $user = Shop_user::where('openid', $userInfo->id)->get();
        //是否已经注册
        if (is_null($user)) {
            return redirect('shop/user');
        }
        $tickets = Shop_user_ticket::select('ticket_id')
            ->where('openid', $userInfo->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $tickets = $tickets->map(function ($item, $key) {
            return Ticket::find($item->ticket_id);
        })->all();

        return view('shop.coupon', compact('tickets'));
    }
}
