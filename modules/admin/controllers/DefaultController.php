<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Settings;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class DefaultController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['index'],
                'rules' => [
                    [
                        // 'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDate()
    {
        $model = Settings::findOne(2);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['default/date']);
        } else {
            return $this->render('date', [
                'model' => $model
            ]);
        }
    }
}
