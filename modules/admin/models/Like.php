<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "like".
 *
 * @property integer $id
 * @property string $boy
 * @property string $girl
 */
class Like extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'like';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['boy', 'girl'], 'required'],
            [['boy', 'girl'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'boy' => 'Boy',
            'girl' => 'Girl',
        ];
    }
}
