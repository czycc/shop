<?php

namespace App\Http\Controllers\Api;

use App\Events\CoinChange;
use App\Models\Order;
use App\Models\Reward;
use App\Models\Shop_user;
use App\Models\Shop_user_ticket;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DrawController extends Controller
{
    public function draw(Request $request)
    {
        $user = Shop_user::where('openid', $request->openid)->first();
        if ($user->coin < config('vip.drawCoin')) {
            return response()->json(
                [
                    'code' => 0,
                    'coin' => $user->coin
                ]
            );
        }
        $user->coin -= config('vip.drawCoin'); //抽奖花费金币
        $user->save();
        //记录日志
        event(new CoinChange($request->openid, config('vip.drawCoin'), '礼品抽奖', '-'));

        return response()->json([
            'code' => 1,
            'coin' => $user->coin
        ]);
    }

    public function coin(Request $request)
    {
        $user = Shop_user::where('openid', $request->openid)->first();
        if ($user->num <= 3 && $user->updated_at >= Carbon::today()){

        }
        //保存中奖金币
        $user->coin += $request->count;
        $user->save();
        //记录日志
        event(new CoinChange($request->openid, $request->count, '抽中金币', '+'));

        return response()->json([
            'code' => 1,
            'coin' => $user->coin
        ]);
    }

    public function ticket(Request $request)
    {
        //查找未分配优惠券
        $ticket = Ticket::select('id')
            ->where('status', '0')
            ->where('end', '>', Carbon::now())
            ->first();
        //优惠券已经领完
        if (is_null($ticket)) {
            return response()->json([
                'code' => 0
            ]);
        }

        //分配优惠券
        $userTicket = new Shop_user_ticket;
        $userTicket->openid = $request->openid;
        $userTicket->ticket_id = $ticket->id;
        $userTicket->save();
        //更改已经分配优惠券的状态
        $ticket->status = '1';
        $ticket->save();

        return response()->json([
            'code' => 1
        ]);
    }

    public function reward(Request $request)
    {
        $user = Shop_user::where('openid', $request->openid)->first();
        if ($user->coin < config('vip.exchange')) {
            return response()->json(
                [
                    'code' => 0,
                    'coin' => $user->coin
                ]
            );
        }
        //查看奖品库存
        $reward = Reward::first();
        //判断奖品库存
        if($reward->{$request->type} == 0){
            return response()->json(
                [
                    'code' => 0,
                    'coin' => $user->coin
                ]
            );
        }
        //库存减少
        $reward->{$request->type} -= 1;
        $reward->save();
        //更改金币数量
        $user->coin -= config('vip.exchange');
        $user->save();
        //记录日志
        event(new CoinChange($request->openid, config('vip.exchange'), '兑换奖品', '-'));
        //录入订单
        $order = new Order;
        $order->shop_user_id = $user->id;
        $order->type = $request->type;
        $order->location = $user->location;
        $order->mobile = $user->mobile;
        $order->name = $user->name;
        $order->save();

        return response()->json(
            [
                'code' => 1,
                'coin' => $user->coin
            ]
        );
    }
}
