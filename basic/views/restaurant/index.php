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

    <p>
        </p><?//= Html::a('Добавть свой ресторан', ['site/register'], ['class' => 'btn btn-success']) ?>
        <a href="/maps/Gid_po_restorannomu_dnyu_21_05_2016_final.pdf" target="_blank" class='btn btn-success'>Скачать карту <span class='glyphicon glyphicon-cloud-download'></span></a>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-striped table-bordered rest-table'],
       // 'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a($data->title,$data->soc_pagev,['target' => '_blank']);
                }
            ],
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

            
           // 'concept:ntext',
        //    'menu:ntext',
          
          //  'soc_pagev',
        //    'link',
         //   'email:email',
            //'coord_g',
            // 'coord_k',
           // 'is_active',

        ],
    ]); ?>

</div>

