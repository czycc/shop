<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
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
                $ticket = Ticket::all()->last();
                $ticketDay = Ticket::where('created_at', '>', Carbon::today())->count();
                $row->column(3, new InfoBox('已领优惠券总数', 'users', 'aqua', '', $ticket->ticket_id));
                $row->column(3, new InfoBox('今日已领优惠券', 'shopping-cart', 'green', '/admin/orders', $ticketDay));
            });

        });
    }
}
