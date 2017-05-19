<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
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
use app\models\Geoobjects;
use app\modules\admin\models\Settings;

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
                    'logout' => ['get'],
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

        $model = Settings::findOne(1);
        return $this->render($model->value ? 'register' : 'stop-register');
    }

    public function actionStopregister(){
      $url = parse_url($_SERVER['HTTP_REFERER']);
      $url['host'] == 'webvisor.com' ? $view = 'register' : $view = 'stop-register';
      return $this->render($view);
    }

    public function actionRegisterStop(){
        if(isset($_GET['pass']) && $_GET['pass']=='avatar910'){
            $model = Settings::findOne(1);
            $model->value = 0;
            echo $model->save();
        }
    }

    public function actionRegisterOpen(){
        if(isset($_GET['pass']) && $_GET['pass']=='avatar910'){
            $model = Settings::findOne(1);
            $model->value = 1;
            echo $model->save();
        }
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

    public function actionCheckText(){
         $data = [
            'text1' => mb_strlen($_GET['text1'], 'utf-8'),
            'text2' => mb_strlen($_GET['text2'], 'utf-8'),
            ];
         echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function actionNewRest(){
        $model = new Restaurant();
        $model->title = $_GET['title'];
        $model->concept = $_GET['concept'];
        $model->menu = $_GET['menu'];
        $model->address_street = $_GET['address_street'];
        $model->address_building = $_GET['address_building'];
        $model->address_building_num = intval($_GET['address_building']);
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
        $model->address_building_num = intval($_GET['address_building']);
        $model->address_comment = $_GET['address_comment'];
        $model->time = $_GET['time'];
        $model->time2 = $_GET['time2'];
        $model->phone = $_GET['phone'];
        $model->soc_pagev = $_GET['soc_pagev'];
        $model->link = $_GET['link'];
        $model->email = $_GET['email'];
        $model->is_active = 2;
        $url = Url::to(['restaurant/update', 'updatelink' => $model->updatelink]);
        echo $model->save() ? $url : "false";

            // Yii::$app->mail->compose('layouts/sendlink',['url' => $url ])
            // ->setFrom(['saitom@yandex.ru' => 'rd-nnov.ru'])
            // ->setTo($_GET['email'])
            // ->setSubject('Обновление анкеты на rd-nnov.ru')
            // ->send();
    }

    public function actionRestJson(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        if(isset($_GET['id'])){
            $model = Restaurant::find()->where(['geoobject' => $_GET['id']])->orderBy(['title' => SORT_ASC])->all();
        }else{
            $model = Restaurant::find()->orderBy(['title' => SORT_ASC])->all();
        }
        $data = ArrayHelper::toArray($model);
        echo json_encode($data);

    }

    public function actionGeoobjectsJson(){
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        $data = [];
        $Geoobjects = Geoobjects::find()->all();
        foreach($Geoobjects as $item){
            $rests = Restaurant::find()->where(['geoobject' => $item->id])->all();
            $dataRest = [];
            foreach($rests as $itemRest){
                array_push($dataRest, ArrayHelper::toArray($itemRest));
            }
            array_push($data, [
                    'id' => $item->id,
                    'title' => $item->title,
                    'latitude' => $item->latitude,
                    'longitude' => $item->longitude,
                    'rests' => $dataRest
                ]);
        }

        $Restaurant = Restaurant::find()->orderBy(['address_street' => SORT_ASC])->all();
        $dataRestaurant = [];
        foreach($Restaurant as $item){
            $tempArray = ArrayHelper::toArray($item);
            $tempArray['coord'] = ['latitude' => $item->coord->latitude,'longitude' => $item->coord->longitude];
            array_push($dataRestaurant, $tempArray);
        }
        echo json_encode(['geoobjects' => $data, 'rests' => $dataRestaurant]);
    }
}
