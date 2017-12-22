<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Images;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
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

            $content->header('图片库');
            $content->description('图片库');

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

            $content->header('图片库');
            $content->description('图片库');

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

            $content->header('图片库');
            $content->description('图片库');

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
        return Admin::grid(Images::class, function (Grid $grid) {
            $grid->tools(function ($tools) {
                $tools->batch(function ($batch) {
                    $batch->disableDelete();
                });
            });
//            $grid->disableCreation();
            $grid->disableExport();
//            $grid->disableActions();
            $grid->model()->orderBy('id', 'desc');
            $grid->id('ID')->sortable();
            $grid->column('category_id', '栏目')->display(function ($category_id) {
                return Category::find($category_id)->category;
            });
            $grid->column('image_url', '图片')->image('', 150, 150);
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
        return Admin::form(Images::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('category_id')->options(function () {
                $categories = Category::select(['id', 'category'])->get();
                foreach ($categories as $item) {
                    $arr[$item->id] = $item->category;
                }
                return $arr;
            });
            $form->image('image_url')->uniqueName();
            $form->display('created_at', '创建时间');

            $form->saving(function ($form) {
            });
        });
    }
}
