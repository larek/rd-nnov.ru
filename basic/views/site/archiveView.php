<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Ресторанный день в Нижнем Новгороде '. $content->Transdate($content->dateDay);
$this->params['breadcrumbs'][] = ['label' => 'Архив', 'url' => ['site/archive']];
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
        <h1 style='margin-top:0px;'>Ресторанный день <?= Html::encode($content->Transdate($content->dateDay)); ?></h1>
        
        <?= $content->content; ?>
    </div>

</div>
