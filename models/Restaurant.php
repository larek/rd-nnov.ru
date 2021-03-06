<?php

namespace app\models;

use Yii;
use app\models\Geoobjects;
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
 * @property integer $geoobject
 */
class Restaurant extends \yii\db\ActiveRecord
{

    public function getCoord(){
        return $this->hasOne(Geoobjects::className(),['id' => 'geoobject']);
    }
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
            [['concept', 'menu'], 'string', 'max'=>450],
            [['is_active','geoobject'], 'integer'],
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
            'address_building_num' => 'Номер дома без буквы',
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
