<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Todolist;
use app\modules\admin\models\TodolistSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * TodoController implements the CRUD actions for Todolist model.
 */
class TodoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        // ...set `$this->enableCsrfValidation` here based on some conditions...
        // call parent method that will check CSRF if such property is true.
        if ($action->id === 'create-task' || $action->id === 'list' || $action->id === 'delete-task' || $action->id === 'close-task' || $action->id === 'active-task') {
            # code...
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    /**
     * Lists all Todolist models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TodolistSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Todolist model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionList(){
        if(isset($_GET['status'])){
            $model = Todolist::find()->where(['status' => $_GET['status']])->orderBy(['updateDate' => SORT_DESC])->all();
        }else{
            $model = Todolist::find()->orderBy(['updateDate' => SORT_DESC])->all(); 
        }
        $data = ArrayHelper::toArray($model);
        echo json_encode($data);
    }

    /**
     * Creates a new Todolist model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateTask()
    {
        $model = new Todolist();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            echo 1;
            // return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing Todolist model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Todolist model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteTask()
    {
        $id = $_POST['id'];
        $this->findModel($id)->delete();
    }

    public function actionCloseTask(){
        $model = Todolist::findOne($_POST['id']);
        $model->status = 1;
        $model->save();
    }

    public function actionActiveTask(){
        $model = Todolist::findOne($_POST['id']);
        $model->status = 0;
        $model->save();
    }

    /**
     * Finds the Todolist model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Todolist the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Todolist::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
