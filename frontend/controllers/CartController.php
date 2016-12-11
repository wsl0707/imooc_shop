<?php
namespace frontend\controllers;
/**
 * 购物车页
 */
use Yii;
use frontend\controllers\base\BaseController;

class CartController extends BaseController{
    /**
     * 购物车
     */
    public function actionIndex(){

        $this->layout = 'index';
        return $this->render('index');
    }
}
