<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Архив';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    

    <div class="list-group col-md-3">


    <?
    foreach($dayList as $item){
        
        $item->dateDay == $dayDate ? $active = "active" : $active = "";  
        
        echo Html::a($item->transdate($item->dateDay),['site/archive-view', 'dayDate' => $item->dateDay],['class'=>'list-group-item '. $active]);    
    }
    ?>
    </div>   
    <div class='col-md-9'>
        <h1 style='margin-top:0px;'><?= Html::encode($this->title) ?></h1>
        <p>Мы собрали архив отчетов о всех прошедших ресторанных днях с 17 ноября 2012 года по сегодняшний момент. Чтобы увидеть ссылки на отчеты, выберите дату слева.</p>
        <p>Если вы нашли отчет, ссылка на который отсутствует в нашем архиве, <?= Html::a('свяжитесь с нами',['site/contact']); ?>, и мы обязательно дополним архив.</p>
    </div>

</div>
