<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Restaurant */
$this->title = 'Создание ресторана';
$this->params['breadcrumbs'][] = ['label' => 'Рестораны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurant-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <div class='col-md-6'>
        
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>

</div>
