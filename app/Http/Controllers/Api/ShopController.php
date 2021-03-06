<?php

namespace App\Http\Controllers\Api;

use App\Events\CoinChange;
use App\Models\Pv;
use App\Models\Share;
use App\Models\Shop_user;
use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Ticket;
use App\Models\Shop_user_ticket;

class ShopController extends Controller
{
    public function register(Request $request)
    {
        Validator::make($request->all(), [
            'openid' => 'required',
            'username' => 'max:10',
            'location' => 'max:50',
            'birthday' => 'required|date',
            'mobile' => 'required|max:11'
        ])->validate();

        $user = Shop_user::where('openid', $request->openid)->first();
        if (is_null($user)){
            //保存用户数据
            $user = new Shop_user;
            $user->openid = $request->openid;
            $user->name = $request->username;
            $user->location = $request->location;
            $user->birthday = $request->birthday;
            $user->mobile = $request->mobile;
            $user->sign = Carbon::yesterday();

//            //查找未分配优惠券
//            $ticket = Ticket::select('id')
//                ->where('status', '0')
//                ->where('end', '>', Carbon::now())
//                ->first();
//            //优惠券已经领完
//            if (!is_null($ticket)) {
//                //分配优惠券
//                $userTicket = new Shop_user_ticket;
//                $userTicket->openid = $request->openid;
//                $userTicket->ticket_id = $ticket->id;
//                $userTicket->save();
//                //更改已经分配优惠券的状态
//                $ticket->status = '1';
//                $ticket->save();
//            }

            //没有填写非必填项
            if (is_null($request->username) || is_null($request->location)){
                $user->coin = 5;
                $user->save();
                //可以领取5金币
                event(new CoinChange($request->openid,'5','注册奖励','+'));

                return response()->json([
                    'is_new' => 1,
                    'type' => 1
                ]);
            }

            //可以领取10金币
            $user->coin = 10;
            $user->type = '1';
            $user->save();
            event(new CoinChange($request->openid,'10','注册奖励','+'));

            return response()->json([
                'is_new' => 1,
                'type' => 2
            ]);

        }elseif ($user->type == '0'){
            //保存数据
            $user->name = $request->username;
            $user->location = $request->location;
            $user->birthday = $request->birthday;
            $user->mobile = $request->mobile;

            //没有填写非必填项
            if (is_null($request->username) || is_null($request->location)){
                $user->save();
                //不可以领取
                return response()->json([
                    'is_new' => 0,
                    'type' => 0
                ]);
            }

            //第二次完善信息，发放5金币
            $user->type = '1';
            $user->coin += 5;
            $user->save();
            event(new CoinChange($request->openid,'5','注册奖励','+'));

            return response()->json([
                'is_new' => 0,
                'type' => 1
            ]);
        }

        //不能发放金币，保存数据
        $user->name = $request->username;
        $user->location = $request->location;
        $user->birthday = $request->birthday;
        $user->mobile = $request->mobile;
        $user->save();

        return response()->json([
            'is_new' => 0,
            'type' => 0
        ]);
    }

    public function share()
    {
        $share = Share::find(1);
        $share->share += 1;
        $share->save();
        return 'true';
    }

    public function data()
    {
        for($i = 1;$i<68;$i++){
            $a =Statistic::find($i);
            $b = Pv::find($i);
            $c = $a;
            if ($a->userPage > $b->userPage){
                $a->userPage =$b->userPage;
                $b->userPage =$c->userPage;
                $a->save();
                $b->save();
            }elseif ($a->newPage > $b->newPage){
                $a->newPage =$b->newPage;
                $b->newPage =$c->newPage;
                $a->save();
                $b->save();
            }elseif ($a->starPage > $b->starPage){
                $a->starPage =$b->starPage;
                $b->starPage =$c->starPage;
                $a->save();
                $b->save();
            }
        }
        return 'true';
    }
}
