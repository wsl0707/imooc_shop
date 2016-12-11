<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = '忘记密码';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sign-overlay"></div>
<div class="signpanel"></div>

<div class="panel signin">
    <div class="panel-heading">
        <h4 class="panel-title">欢迎登陆博客系统</h4>
    </div>
    <div class="panel-body">
        <button class="btn btn-primary btn-quirk btn-fb btn-block">联系我们</button>
        <div class="or">or</div>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username', [
            'inputOptions' => [
                'placeholder' => '请输入账户',
            ],
            'inputTemplate' =>
                '<div class = "input-group">
                        <span class = "input-group-addon"><i class = "fa fa-user"></i></span>{input}
                    </div>',
        ])->label(false) ?>

        <?= $form->field($model, 'email',[
            'inputOptions' => [
                'placeholder' => '请输入注册邮箱',
            ],
            'inputTemplate' =>
                '<div class = "input-group">
                        <span class = "input-group-addon"><i class = "fa fa-lock"></i></span>{input}
                    </div>',
        ])->label(false) ?>

        <div><a href = '<?= Url::to(['site/login'])?>' class = 'forgot'>返回登陆？ </a></div>
        <!--这里不需要use Yii 在Controller已经use了-->
        <?php if(Yii::$app->session->hasFlash('info')){
            echo Yii::$app->session->getFlash('info');
        }
        ?>
        <div class="form-group">
            <?= Html::submitButton('找回密码', ['class' => 'btn btn-primary btn-success btn-quirk btn-block', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div><!-- panel -->