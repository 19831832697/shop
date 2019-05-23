<?php

namespace App\Admin\Controllers;

use App\Model\GoodsModel;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class GoodsController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GoodsModel);

        $grid->goods_id('ID');
        $grid->goods_name('名称');
        $grid->goods_img('图片')->image();
        $grid->market_price('市场价格');
        $grid->goods_price('商品价格');
        $grid->goods_shelf('是否上架');
        $grid->goods_num('Goods num');
        $grid->goods_product('Goods product');
        $grid->goods_new('Goods new');
        $grid->goods_status('Goods status');
        $grid->goods_salenum('Goods salenum');
        $grid->goods_text('Goods text');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(GoodsModel::findOrFail($id));

        $show->goods_id('Goods id');
        $show->goods_name('Goods name');
        $show->is_tell('Is tell');
        $show->goods_img('Goods img');
        $show->market_price('Market price');
        $show->goods_price('Goods price');
        $show->goods_shelf('Goods shelf');
        $show->goods_sn('Goods sn');
        $show->goods_num('Goods num');
        $show->goods_hot('Goods hot');
        $show->sale_num('Sale num');
        $show->goods_product('Goods product');
        $show->goods_desc('Goods desc');
        $show->goods_imgs('Goods imgs');
        $show->brand_id('Brand id');
        $show->cate_id('Cate id');
        $show->goods_new('Goods new');
        $show->goods_status('Goods status');
        $show->goods_salenum('Goods salenum');
        $show->goods_text('Goods text');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new GoodsModel);

        $form->text('goods_name', 'Goods name');
        $form->number('is_tell', 'Is tell');
        $form->file('goods_img', 'Goods img');
        $form->text('market_price', 'Market price');
        $form->decimal('goods_price', 'Goods price');
        $form->text('goods_shelf', 'Goods shelf')->default('1');
        $form->text('goods_sn', 'Goods sn');
        $form->number('goods_num', 'Goods num');
        $form->text('goods_hot', 'Goods hot');
        $form->number('sale_num', 'Sale num');
        $form->text('goods_product', 'Goods product');
        $form->text('goods_desc', 'Goods desc');
        $form->text('goods_imgs', 'Goods imgs');
        $form->number('brand_id', 'Brand id');
        $form->number('cate_id', 'Cate id');
        $form->number('goods_new', 'Goods new');
        $form->switch('goods_status', 'Goods status')->default(1);
        $form->text('goods_salenum', 'Goods salenum');
      

        return $form;
    }
}
