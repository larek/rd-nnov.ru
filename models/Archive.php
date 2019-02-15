<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "archive".
 *
 * @property integer $id
 * @property string $dateDay
 * @property string $content
 */
class Archive extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'archive';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dateDay'], 'required'],
            [['dateDay'], 'safe'],
            [['content'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dateDay' => 'Date Day',
            'content' => 'Content',
        ];
    }
    
        public function Transdate($date){
            $date=explode("-",$date);
            $yy = $date[0]; // Год
            $mm = $date[1]; // Месяц
            $dd = $date[2]; // День
            
            if ($date[1]<10) $mm="0".$date[1];
            // Переназначаем переменные
            if ($mm == "01") $mm1="января";
            if ($mm == "02") $mm1="февраля";
            if ($mm == "03") $mm1="марта";
            if ($mm == "04") $mm1="апреля";
            if ($mm == "05") $mm1="мая";
            if ($mm == "06") $mm1="июня";
            if ($mm == "07") $mm1="июля";
            if ($mm == "08") $mm1="августа";
            if ($mm == "09") $mm1="сентября";
            if ($mm == "10") $mm1="октября";
            if ($mm == "11") $mm1="ноября";
            if ($mm == "12") $mm1="декабря";
            
            $ddtt = $dd." ".$mm1." ".$yy." г. "; // Конечный вид строки
            return $ddtt;
        }
}
