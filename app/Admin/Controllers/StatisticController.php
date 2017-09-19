<?php

namespace App\Admin\Controllers;

use App\Models\Statistic;
use Carbon\Carbon;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class StatisticController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Statistic::class, function (Grid $grid) {

            $grid->tools(function ($tools) {
                $tools->batch(function ($batch) {
                    $batch->disableDelete();
                });
            });
            $grid->disableCreation();
            $grid->disableExport();
            $grid->disableActions();
            $grid->model()
                ->where('date','<',Carbon::yesterday())
                ->orderBy('id', 'desc');

            $grid->column('indexPage', '首页');
            $grid->column('userPage','用户页');
            $grid->column('ticketPage','优惠券页');
            $grid->column('coinPage', '金币页');
            $grid->column('dogPage','爱犬大步走');
            $grid->column('starPage','闪耀星');
            $grid->column('newPage', '秋冬新品');
            $grid->column('rewardPage','礼品店');
            $grid->column('daySign', '当日签到');
            $grid->column('date','日期')->sortable();

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Statistic::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
