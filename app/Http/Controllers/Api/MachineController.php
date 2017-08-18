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
        $today =Carbon::today()->toDateTimeString();
        if ($machine == null) {
            return response()->json([
                'code' => 0,
                'desc' => '未找到指定记录'
            ]);

        }
//        elseif ($request->date < $today) {
//            return response()->json([
//                'code' => 0,
//                'desc' => '应为当日时间'
//            ]);
//        }
        $machine->date = $request->date;
        $machine->num = $request->num;
        $machine->save();
        return response()->json([
            'code' => 1,
            'desc' => 'success'
        ]);

    }
}
