<?php

use yii\widgets\ListView;

$this->title = "FAQ";
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= $this->title ?></h1>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    
    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'summary' => false,
    ]);?>
  
</div>
