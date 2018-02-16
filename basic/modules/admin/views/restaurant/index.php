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

    <p><?= Html::a($settings->value == 1 ? 'Закрыть регистрацию' : 'Открыть регистрацию', ['change-register'], ['class' => $settings->value == 1 ? 'btn btn-danger' : 'btn btn-success']);?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,

        'rowOptions' => function ($model, $index, $widget, $grid){
    
          if($model->is_active == 1){
            return ['class' => 'success'];
          }elseif($model->is_active == 2){
            return ['class' => 'danger'];
          }else{
            return [];
          }
        },
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
            [
                'attribute' => 'is_active',
                'format' => 'raw',
                'value' => function($data){
                    switch ($data->is_active) {
                        case 0: return Html::tag('span',"",['class' => 'glyphicon glyphicon-minus']);break;
                        case 1: return Html::tag('span',"",['class' => 'glyphicon glyphicon-ok']);break;
                        case 2: return Html::tag('span',"",['class' => 'glyphicon glyphicon-edit']);break;
                    }
                   return $data->is_active == 1 ? Html::tag('span',"",['class' => 'glyphicon glyphicon-ok']) : Html::tag('span',"",['class' => 'glyphicon glyphicon-minus']);
                }
            ],
            //'is_active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        
    ]); ?>

</div>
