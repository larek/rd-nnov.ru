<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Todolist */
$this->title = 'Todo';

$this->registerJsFile("/js/react-todo.js",['depends' => [\yii\web\JqueryAsset::className()]]);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todolist-create">

    <h1><?= Html::encode($this->title) ?></h1>

	<div id="todo-container"></div>

</div>
