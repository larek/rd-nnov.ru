<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "todolist".
 *
 * @property int $id
 * @property int $userId
 * @property string $title
 * @property int $status
 * @property string $params
 * @property string $createDate
 * @property string $updateDate
 */
class Todolist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'todolist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'status'], 'integer'],
            [['params'], 'string'],
            [['createDate', 'updateDate'], 'safe'],
            [['title'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'title' => 'Title',
            'status' => 'Status',
            'params' => 'Params',
            'createDate' => 'Create Date',
            'updateDate' => 'Update Date',
        ];
    }
}
