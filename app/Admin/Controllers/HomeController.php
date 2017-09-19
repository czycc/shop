<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Relate;
use App\Models\Share;
use App\Models\Shop_user;
use App\Models\Shop_user_ticket;
use App\Models\Ticket;
use Carbon\Carbon;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Chart\Bar;
use Encore\Admin\Widgets\Chart\Doughnut;
use Encore\Admin\Widgets\Chart\Line;
use Encore\Admin\Widgets\Chart\Pie;
use Encore\Admin\Widgets\Chart\PolarArea;
use Encore\Admin\Widgets\Chart\Radar;
use Encore\Admin\Widgets\Collapse;
use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Tab;
use Encore\Admin\Widgets\Table;

class HomeController extends Controller
{
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('首页');
            $content->description('首页');

            $content->row(function ($row) {
                $ticket = Shop_user_ticket::all()->last();
                $user = Shop_user::where('created_at','>', Carbon::today())->count();
                $ticketDay = Shop_user_ticket::where('created_at', '>', Carbon::today())->count();
                $share = Share::find(1);
                $gift1 = Order::where('type', 'gift1')->count();
                $gift2 = Order::where('type', 'gift2')->count();
                $gift3 = Order::where('type', 'gift3')->count();
                $gift4 = Order::where('type', 'gift4')->count();
                $gift5 = Order::where('type', 'gift5')->count();

                $row->column(3, new InfoBox('已兑换压缩T', 'gift', 'blue', '', $gift1));
                $row->column(3, new InfoBox('已兑换狗项圈', 'gift', 'blue', '', $gift2));
                $row->column(3, new InfoBox('已兑换手机壳', 'gift', 'blue', '', $gift3));
                $row->column(3, new InfoBox('已兑换钥匙扣', 'gift', 'blue', '', $gift4));
                $row->column(3, new InfoBox('已兑换徽章', 'gift', 'blue', '', $gift5));
                $row->column(3, new InfoBox('已领优惠券总数', 'ticket', 'aqua', '', $ticket->ticket_id));
                $row->column(3, new InfoBox('今日已领优惠券', 'ticket', 'aqua', '', $ticketDay));
                $row->column(3, new InfoBox('总分享次数', 'share-alt', 'green', '', $share->share));
                $row->column(3, new InfoBox('今日注册用户', 'users', 'red', '', $user));
            });

        });
    }
}
