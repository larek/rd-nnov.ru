<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "geoobjects".
 *
 * @property int $id
 * @property string $title
 * @property double $latitude
 * @property double $longitude
 */
class Geoobjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geoobjects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['latitude', 'longitude'], 'number'],
            [['title'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }
}
