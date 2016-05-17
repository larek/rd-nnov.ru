<?php

namespace app\modules\admin\controllers;

use yii\filters\AccessControl;
use app\modules\admin\models\Like;

class LikeController extends \yii\web\Controller
{

	public function behaviors()
    {
        return [
            
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['index','create','update','view'],
                'rules' => [
                    [
                       // 'actions' => ['index','create','update','view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {	
    	$model = Like::findOne(1);
        return $this->render('index',[
        	'model' => $model,
        ]);
    }


    public function actionUpdate(){
    	$model = Like::findOne(1);
    	echo $model->boy = $_GET['boy'];
    	$model->girl = $_GET['girl'];
    	echo $model->save();    
    }

}
