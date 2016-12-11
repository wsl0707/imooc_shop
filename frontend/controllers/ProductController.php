<?php
namespace frontend\controllers;
/**
 * 商品列表页控制器
 */
use Yii;
use frontend\controllers\base\BaseController;

class ProductController extends BaseController{
    /**
     * 商品列表
     */
    public function actionIndex(){

        $this->layout = 'menu';
        return $this->render('index');
    }

    public function actionDetail(){

        $this->layout = 'menu';
        return $this->render('detail');
    }
}
