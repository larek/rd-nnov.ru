<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RestaurantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Restaurants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurant-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Restaurant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'concept:ntext',
            'menu:ntext',
            'address_street',
            // 'address_comment:ntext',
            // 'time',
            // 'phone',
            // 'soc_pagev',
            // 'link',
            // 'coord_g',
            // 'coord_k',
            // 'COL_13',
            // 'COL_14',
            // 'COL_15',
            // 'COL_16',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
