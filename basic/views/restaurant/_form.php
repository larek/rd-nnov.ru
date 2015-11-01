<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Restaurant */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile('/js/limit.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/kladrapi-jsclient/jquery.kladr.min.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/kladrapi-jsclient/examples/js/form.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerCssFile('/kladrapi-jsclient/jquery.kladr.min.css');
$this->registerCssFile('/kladrapi-jsclient/examples/css/form.css');
?>
<div class="address">
            <h1>Форма для ввода адреса</h1>
            <form class="js-form-address">
                <div class="field">
                    <label>Индекс</label>
                    <input type="text" name="zip">
                </div>
                <div class="field">
                    <label>Регион</label>
                    <input type="text" name="region">
                </div>
                <div class="field">
                    <label>Район</label>
                    <input type="text" name="district">
                </div>
                <div class="field">
                    <label>Город</label>
                    <input type="text" name="city">
                </div>
                <div class="field">
                    <label>Улица</label>
                    <input type="text" name="street">
                </div>
                <div class="field">
                    <label>Дом</label>
                    <input type="text" name="building">
                </div>
                <div class="tooltip" style="display: none;"><b></b><span></span></div>
            </form>
        </div>
        
<div class="restaurant-form">

    <?php $form = ActiveForm::begin([
        'id' => 'form',
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'concept')->textarea(['rows' => 3, 'id' => 'concept']) ?>
    <span id='infodiv-concept'></span>
    
    <?= $form->field($model, 'menu')->textarea(['rows' => 3, 'id'=>'menu']) ?>
    <span id='infodiv-menu'></span>
        
    <?= $form->field($model, 'address_street')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'address_building')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'time')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'time2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'soc_pagev')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
