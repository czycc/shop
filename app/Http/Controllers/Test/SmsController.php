<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Toplan\Sms\Facades\SmsManager;
use Validator;

class SmsController extends Controller
{

    public function index(Request $request)
    {
        $messages = [
            //验证规则
        ];
        $validator = Validator::make($request->all(), [
            'mobile'     => 'required|confirm_mobile_not_change|confirm_rule:mobile_required',
            'verifyCode' => 'required|verify_code',
        ], $messages);
        if ($validator->fails()) {
            //验证失败后建议清空存储的发送状态，防止用户重复试错
            SmsManager::forgetState();
            return redirect()->back()->withErrors($validator);
        }
        return 'true';
    }
}
