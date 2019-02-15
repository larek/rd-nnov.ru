<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Restaurant */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Рестораны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurant-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'concept:ntext',
            'menu:ntext',
            'address_street',
            'address_building',
            'address_comment:ntext',
            'time',
            'time2',
            'phone',
            'soc_pagev',
            'link',
            'email:email',
            'admin_comment',
            [
                'attribute' => 'is_active',
                'value' => $model->is_active == 1 ? 'Дa' : 'Нет'
            ],
        ],
    ]) ?>

</div>
