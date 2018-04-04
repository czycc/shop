<?php

namespace App\Admin\Controllers;

use App\Models\Order;

use App\Models\Shop_user;
use App\Models\Shop_user_ticket;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class OrderController extends Controller
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
        return Admin::grid(Order::class, function (Grid $grid) {
            $grid->tools(function ($tools) {
                $tools->batch(function ($batch) {
                    $batch->disableDelete();
                });
            });
            $grid->disableCreation();
            $grid->disableExport();
            $grid->disableActions();
            $grid->model()->orderBy('id', 'desc');
            $grid->id('ID')->sortable();
            $grid->column('name','姓名')->display(function (){
                return Shop_user::find($this->shop_user_id)->name;
            });
            $grid->column('location', '收货地址')->display(function (){
                return Shop_user::find($this->shop_user_id)->location;
            });
            $grid->column('mobile', '手机号')->display(function (){
                return Shop_user::find($this->shop_user_id)->mobile;
            });
            $grid->column('奖品类型')->display(function (){
                switch ($this->type){
                    case 'gift1':
                        return '压缩T';
                    case 'gift2':
                        return '狗项圈';
                    case 'gift3':
                        //后期修改，奖品类型调整
                        if ($this->created_at < '2018-04-01 15:53:11') {
                            return '手机壳';
                        }
                        return '狗零食';
                    case 'gift4':
                        return '钥匙扣';
                    case 'gift5':
                        return '徽章';
                }

            });
            $grid->created_at('创建时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Order::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
