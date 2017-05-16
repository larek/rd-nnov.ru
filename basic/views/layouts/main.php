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

<meta property="og:image" content="http://rd-nnov.ru/images/front-page-banner.jpg"/>
<meta property="og:site_name" content="Ресторанный день 21 ноября 2015"/>
<meta property="og:title" content="Как попасть в группу ресторанного дня и на бумажную карту ресторанов?"/>
<meta property="og:description" content="Ресторанный день в Нижнем Новгороде. Список ресторанов и площадок. Ответы на популярные вопросы"/>
<meta property="og:url" content="http://rd-nnov.ru/<?= Yii::$app->request->pathInfo?>"/>
<meta property="og:type" content="article"/>

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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-99269322-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter33392643 = new Ya.Metrika({
                    id:33392643,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/33392643" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>
<?php $this->endPage() ?>
