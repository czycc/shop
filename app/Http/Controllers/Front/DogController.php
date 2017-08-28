<?php

namespace App\Http\Controllers\Front;

use App\Models\Machine;
use App\Models\Relate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop_user;
use Validator;
use EasyWeChat\Foundation\Application;

class DogController extends Controller
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
     * 爱犬大步走
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index()
    {
        //判断是否注册
        $user_info = session('wechat.oauth_user');
        $user = Shop_user::where('openid', $user_info->id)->first();
        if (is_null($user)) {
            return redirect('shop/user');
        }
        //查找指定用户信息
        $relate = Relate::where('openid', $user_info->id)->first();
        if (is_null($relate)){
            return view('shop.dog_step', 'js');
        }

        $machines = Machine::with('relate')
            ->where('type','1')
            ->orderBy('num', 'desc')
            ->limit(7)
            ->get();
        return view('shop.rank', compact('relate', 'machines', 'js'));
    }

    /**
     * 爱犬大步走关联计步器
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function relate(Request $request)
    {
        Validator::make($request->all(), [
            'mac' => 'required'
        ])->validate();

        $userInfo = session('wechat.oauth_user');
        $relate = new Relate;
        $relate->openid = $userInfo->id;
        $relate->avatar = $userInfo->avatar;
        $relate->nickname = $userInfo->name;
        //查找设备
        $machine = Machine::where('mac', $request->mac)
            ->where('type', '0')
            ->first();
        if (is_null($machine)){
            return redirect('shop/dog')->with('error', '请输入正确的设备号');
        }
        //分配设备
        $machine->type = '1';
        $machine->save();
        $relate->machine_id = $machine->id;
        $relate->day = Carbon::yesterday();
        $relate->save();

        return redirect('shop/dog');
    }
}
