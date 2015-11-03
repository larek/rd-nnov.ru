<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Площадки для проведения ресторанного дня';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rent-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
           // 'title',
            'address',
            'description:raw',
            'contact:raw',
            'condition:raw',
            'comment:raw',

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
