<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RestaurantSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'concept') ?>

    <?= $form->field($model, 'menu') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'address_comment') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'soc_pagev') ?>

    <?php // echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'coord_g') ?>

    <?php // echo $form->field($model, 'coord_k') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
