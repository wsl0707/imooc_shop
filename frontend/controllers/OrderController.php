<?php
namespace frontend\controllers;
/**
 *
 */
use Yii;
use frontend\controllers\base\BaseController;

class OrderController extends BaseController{
    /**
     *
     */
    public function actionIndex(){

        $this->layout = 'menu';
        return $this->render('index');
    }

    public function actionCheck(){

        $this->layout = 'index';
        return $this->render('check');
    }

}
