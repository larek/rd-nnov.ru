<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Faq;
use yii\data\ActiveDataProvider;
use app\models\Archive;
use app\models\Pages;
use app\models\Restaurant;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionArchive(){
        $dayList = Archive::find()->orderBy(['dateDay' => SORT_DESC])->all();
        return $this->render('archive',[
                'dayList' => $dayList,
            ]);

    }

    public function actionArchiveView(){
        $dayDate = Yii::$app->request->get("dayDate");
        $dayList = Archive::find()->orderBy(['dateDay' => SORT_DESC])->all();
        $dayDate ? $content = Archive::find()->where(['dateDay' => $dayDate])->one() : $content = "content";
        return $this->render('archiveView',[
                'dayList' => $dayList,
                'content' => $content,
                'dayDate' => $dayDate,
            ]);

    }

    public function actionRegister(){


      return $this->render('stop-register');
    }

    public function actionStopregister(){
      $url = parse_url($_SERVER['HTTP_REFERER']);
      $url['host'] == 'webvisor.com' ? $view = 'register' : $view = 'stop-register';
      return $this->render($view);
    }

    public function actionLogin()
    {
        $this->layout = 'login';

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionFaq(){
        $query = Faq::find();
        $query->orderBy(['title' => SORT_ASC]);
        $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
        return $this->render('faq',[
                'dataProvider' => $dataProvider,
            ]);
    }

    public function actionContact()
    {
        $model = Pages::findOne(1);
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionNewRest(){
        $model = new Restaurant();
        $model->title = $_GET['title'];
        $model->concept = $_GET['concept'];
        $model->menu = $_GET['menu'];
        $model->address_street = $_GET['address_street'];
        $model->address_building = $_GET['address_building'];
        $model->address_comment = $_GET['address_comment'];
        $model->time = $_GET['time'];
        $model->time2 = $_GET['time2'];
        $model->phone = $_GET['phone'];
        $model->soc_pagev = $_GET['soc_pagev'];
        $model->link = $_GET['link'];
        $model->email = $_GET['email'];
        $model->updatelink = md5(time().$_GET['title']);
        $url = Url::to(['restaurant/update', 'updatelink' => $model->updatelink]);
        echo $model->save() ? $url : "false";

            Yii::$app->mail->compose('layouts/sendlink',['url' => $url, 'sendtype' => 'register' ])
            ->setFrom(['saitom@yandex.ru' => 'rd-nnov.ru'])
            ->setTo($_GET['email'])
            ->setSubject('Регистрация rd-nnov.ru')
            ->send();
    }

    public function actionUpdateRest(){
        $model = Restaurant::find()->where(['id' => $_GET['id']])->one();
        $model->title = $_GET['title'];
        $model->concept = $_GET['concept'];
        $model->menu = $_GET['menu'];
        $model->address_street = $_GET['address_street'];
        $model->address_building = $_GET['address_building'];
        $model->address_comment = $_GET['address_comment'];
        $model->time = $_GET['time'];
        $model->time2 = $_GET['time2'];
        $model->phone = $_GET['phone'];
        $model->soc_pagev = $_GET['soc_pagev'];
        $model->link = $_GET['link'];
        $model->email = $_GET['email'];
        $model->is_active = 0;
        $url = Url::to(['restaurant/update', 'updatelink' => $model->updatelink]);
        echo $model->save() ? $url : "false";

            Yii::$app->mail->compose('layouts/sendlink',['url' => $url ])
            ->setFrom(['saitom@yandex.ru' => 'rd-nnov.ru'])
            ->setTo($_GET['email'])
            ->setSubject('Обновление анкеты на rd-nnov.ru')
            ->send();
    }
}
