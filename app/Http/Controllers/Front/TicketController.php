<?php

namespace App\Http\Controllers\Front;

use App\Models\Shop_user;
use App\Models\Shop_user_ticket;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;
use Carbon\Carbon;

class TicketController extends Controller
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
     *优惠券显示
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function show()
    {
        $userInfo = session('wechat.oauth_user');
        $user = Shop_user::where('openid', $userInfo->id)->first();
        //是否已经注册
        if (empty($user)) {
            return redirect('shop/user');
        }
        $tickets = Shop_user_ticket::select('ticket_id')
            ->where('openid', $userInfo->id)
            ->orderBy('created_at', 'desc')
            ->get();
        //自动发放优惠券
        if ($tickets->isEmpty()) {
            //查找未分配优惠券-暇步士
            $ticket = Ticket::select('id')
                ->where('status', '0')
                ->where('type', '暇步士')
                ->where('end', '>', Carbon::now())
                ->first();

            //分配优惠券
            $userTicket = new Shop_user_ticket;
            $userTicket->openid = $userInfo->id;
            $userTicket->ticket_id = $ticket->id;
            $userTicket->save();
            //更改已经分配优惠券的状态
            $ticket->status = '1';
            $ticket->save();

            //查找未分配优惠券-酷迪
            $ticket = Ticket::select('id')
                ->where('status', '0')
                ->where('type', '酷迪')
                ->where('end', '>', Carbon::now())
                ->first();
            //分配优惠券
            $userTicket = new Shop_user_ticket;
            $userTicket->openid = $userInfo->id;
            $userTicket->ticket_id = $ticket->id;
            $userTicket->save();
            //更改已经分配优惠券的状态
            $ticket->status = '1';
            $ticket->save();

            //查找未分配优惠券-宠颐生
            $ticket = Ticket::select('id')
                ->where('status', '0')
                ->where('type', '宠颐生')
                ->where('end', '>', Carbon::now())
                ->first();
            //分配优惠券
            $userTicket = new Shop_user_ticket;
            $userTicket->openid = $userInfo->id;
            $userTicket->ticket_id = $ticket->id;
            $userTicket->save();
            //更改已经分配优惠券的状态
            $ticket->status = '1';
            $ticket->save();

            //重新查找优惠券
            $tickets = Shop_user_ticket::select('ticket_id')
                ->where('openid', $userInfo->id)
                ->orderBy('created_at', 'desc')
                ->get();
        }
        $tickets = $tickets->map(function ($item, $key) {
            return Ticket::find($item->ticket_id);
        })->all();
        $js = $this->js;
        return view('shop.coupon', compact('tickets', 'js'));
    }
}
