<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Models\Machine;

class MachineController extends Controller
{
    public function update(Request $request)
    {
        Validator::make($request->all(), [
            'mac' => 'required',
            'date' => 'date',
            'num' => 'required|numeric'
        ])->validate();

        $machine = Machine::where('mac', $request->mac)->first();
        //找不到设备时保存信息
        if ($machine == null) {
            $machine = new Machine;
            $machine->mac = $request->mac;
            $machine->num = $request->num;
            $machine->total = $request->num;
        } else {
            //处理找到设备的情况
            //判断是不是今日已经更新过数据
            if ($machine->date >= Carbon::today()) {
                $sub = $request->num - $machine->num;
                $machine->num = $request->num;
                $machine->total += $sub;
            }else {
                $machine->num = $request->num;
                $machine->total += $request->num;
            }
        }
        $machine->date = $request->date;
        $machine->save();


        return response()->json([
            'code' => 1,
            'desc' => $request->mac
        ]);

    }
}
