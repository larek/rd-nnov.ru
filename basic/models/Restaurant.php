<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "restaurant".
 *
 * @property integer $id
 * @property string $title
 * @property string $concept
 * @property string $menu
 * @property string $address_street
 * @property string $address_building
 * @property string $address_comment
 * @property string $time
 * @property string $phone
 * @property string $soc_pagev
 * @property string $link
 * @property string $email
 * @property string $coord_g
 * @property string $coord_k
 */
class Restaurant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'restaurant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['concept', 'menu'], 'string', 'max'=>250],
            [['is_active'], 'integer'],
            [['title', 'address_street', 'address_building', 'address_comment', 'time', 'time2', 'phone', 'soc_pagev', 'link', 'coord_g', 'coord_k','email', 'updatelink'], 'string', 'max' => 250],
        
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
            'concept' => 'Концепция',
            'menu' => 'Основные блюда',
            'address_street' => 'Улица',
            'address_building' => 'Номер дома',
            'address_comment' => 'Пояснение к адресу',
            'time' => 'Время от',
            'time2' => 'Время до',
            'phone' => 'Телефон',
            'soc_pagev' => 'Страница в соцсетях',
            'link' => 'Ссылка на пост для анонса в группу ресторанного дня',
            'email' => 'email',
            'coord_g' => 'Coord G',
            'coord_k' => 'Coord K',
            'updatelink' => 'Update Link',
            'is_active' => 'Проверен',
        ];
    }
}
