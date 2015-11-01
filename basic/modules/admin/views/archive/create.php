<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Archive */

$this->title = 'Create Archive';
$this->params['breadcrumbs'][] = ['label' => 'Archives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="archive-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
