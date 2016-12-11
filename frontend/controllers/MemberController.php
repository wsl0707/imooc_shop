<?php
namespace frontend\controllers;
/**
 * 首页控制器
 */
use Yii;
use frontend\controllers\base\BaseController;

class MemberController extends BaseController{
    /**
     * 文章列表
     */
    public function actionAuth(){

        $this->layout = 'menu';
        return $this->render('auth');
    }
}
