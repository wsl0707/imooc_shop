<?php
namespace frontend\controllers;
/**
 * 首页控制器
 */
use Yii;
use frontend\controllers\base\BaseController;

class IndexController extends BaseController{
    /**
     * 文章列表
     */
    public function actionIndex(){

        $this->layout = 'index';
        return $this->render('index');
    }
}
