<?php

namespace App\Http\Controllers\Api;

use App\Events\CoinChange;
use App\Models\Shop_user;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

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
}
