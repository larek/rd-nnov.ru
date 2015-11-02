<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rent".
 *
 * @property integer $id
 * @property string $title
 * @property string $address
 * @property string $description
 * @property string $contact
 * @property string $condition
 * @property string $comment
 */
class Rent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description', 'contact', 'condition', 'comment'], 'string'],
            [['title', 'link', 'address'], 'string', 'max' => 250]
       ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'link' => 'Ссылка',
            'address' => 'Адрес',
            'description' => 'Описание',
            'contact' => 'Контакты',
            'condition' => 'Условия',
            'comment' => 'Комментарий',
        ];
    }
}
