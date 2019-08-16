<?php

use yii\widgets\ActiveForm;
use yii\bootstrap\Html;

$this->title = 'Дата ресторанного дня';
?>
<h1><?php echo $this->title ?></h1>
<div class='row'>
  <div class="col-md-6">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'value')->textInput(['type' => 'date'])->label('Дата мероприятия') ?>

    <div class="form-group">
      <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </div>
</div>