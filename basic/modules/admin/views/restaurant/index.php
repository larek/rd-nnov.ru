<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RestaurantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Рестораны';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurant-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            [
                'label' => 'Режим работы',
                'attribute' => 'time',
                'value' => function($data){
                    return $data->time." - ".$data->time2;
                }
            ],
            [
                'label' => 'Адрес',
                'attribute' => 'address_street',
                'format' => 'raw',
                'value' => function($data){
                    $data->address_comment ? $address_comment = "(".$data->address_comment.")" : $address_comment = "";
                    return $data->address_street.", ".$data->address_building." ".$address_comment."<br>".$data->phone;
                }
            ],
            
            [
                'label' => 'Концепция/меню',
                'format' => 'raw',
                'value' => function($data){
                    $data->concept ? $concept = $data->concept."<br><br>" : $concept = "";
                    $data->menu? $menu = $data->menu : $menu = "";
                    return $concept.$menu;
                }
            ],
            [
                'label' => 'Ссылки',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a('Группа',$data->soc_pagev,['class' => '','target' => '_blank']). "<br>". Html::a('Пост', $data->link,['class' => '','target' => '_blank'])."<br>".Html::a('Обновление','/restaurant-update/'. $data->updatelink,['target' => '_blank']);
                }
            ],
            
           // 'concept:ntext',
        //    'menu:ntext',
          
          //  'soc_pagev',
        //    'link',
         //   'email:email',
            //'coord_g',
            // 'coord_k',
            'is_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
