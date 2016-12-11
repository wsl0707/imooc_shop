<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => YII::t('common', 'Blog'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $leftMenu = [
        ['label' => YII::t('common', 'Home'), 'url' => ['/site/index']],
        ['label' => YII::t('common', 'Content'), 'url' => ['/site/about']],
    ];
//    $rightMenu = [
//        ['label' => YII::t('yii', 'Home'), 'url' => ['/site/index']],
//        ['label' => YII::t('common', 'About'), 'url' => ['/site/about']],
//        ['label' => YII::t('common', 'Contact'), 'url' => ['/site/contact']],
//    ];
    if (Yii::$app->user->isGuest) {
        $rightMenu[] = ['label' => YII::t('common', 'Signup'), 'url' => ['/site/signup']];
        $rightMenu[] = ['label' => YII::t('common', 'Login'), 'url' => ['/site/login']];
    } else {
        $rightMenu[] = [
            'label' => '<img src = "'.Yii::$app->params['avatar']['title'].'" alt = "'.Yii::$app->user->identity->username.'">',
//            'url' => ['/site/logout'],
            'linkOptions' => ['class' => 'avatar'],
            'items' => [
                ['label' => '<i class = "fa fa-sign-out"></i> '.YII::t('common', 'Logout'), 'url' => ['/site/logout'],'linkOptions' => ['data-method' => 'index']],
                ['label' => YII::t('common', 'Center'), 'url' => ['/site/logout']],
            ]
//            'linkOptions' => ['data-method' => 'index']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $leftMenu,
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $rightMenu,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
