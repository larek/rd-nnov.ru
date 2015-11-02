<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content=" width = 1024">
	<link rel="shortcut icon" href="/restaurantday.ico" type="image/x-icon" />
	<link rel="icon" href="/restaurantday.ico" type="image/x-icon" /> 
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Ресторанный день',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/site/index']],
            ['label' => 'Рестораны', 'url' => ['/restaurant/index']],
            ['label' => 'Площадки', 'url' => ['/rent/index']],
            ['label' => 'FAQ', 'url' => ['/site/faq']],
            ['label' => 'Архив', 'url' => ['/site/archive']],
            ['label' => 'Контакты', 'url' => ['/site/contact']],
            //Yii::$app->user->isGuest ?
            //    ['label' => 'Login', 'url' => ['/site/login']] :
            //    [
            //        'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            //        'url' => ['/site/logout'],
            //        'linkOptions' => ['data-method' => 'post']
            //    ],
        ],
    ]);
    NavBar::end();
    ?>

    <? Yii::$app->request->pathInfo == "" ? $class = 'container1' : $class = 'container';?>
    <div class="<?= $class; ?>">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Ресторанный день в Нижнем Новгороде <?= date('Y') ?></p>
        <p class="pull-right"><a href='http://www.restaurantday.org/' target='_blank'>www.restaurantday.org</a></p>
        
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
