<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use app\models\Restaurant;
use app\models\Geoobjects;
/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";
    }

    public function actionGeoobjects(){
    	// get all Restaurants
    	$model = Restaurant::find()->all();
    	foreach($model as $item){
    		$address = $item->address_street." ".$item->address_building;
    		// check in Geoobjects table
    		$geoobject = Geoobjects::find()->where(['title' => $address])->one();
    		if(isset($geoobject->id)){ //if address exist write id in rest table
    			$updateRest = Restaurant::findOne($item->id);
    			$updateRest->geoobject = $geoobject->id;
    			$updateRest->save();
    		}else{ // create geoobject if address empty

    			// get coord by address
    			$coord = $this->getXml(str_replace(" ","+",$address));
        		$coord = explode(" ", $coord);
        		$latitude = $coord[1];
        		$longitude = $coord[0];

    			// create row in Geoobject Table
    			$newGeoobject = new Geoobjects;
    			$newGeoobject->title = $address;
    			$newGeoobject->latitude = $latitude;
    			$newGeoobject->longitude = $longitude;
    			$newGeoobject->save();

    			// update Geoobject id in Restaurant table
    			$updateRest = Restaurant::findOne($item->id);
    			$updateRest->geoobject = $newGeoobject->id;
    			$updateRest->save(); 
    		}
    	}
    }


    public function actionGeoCoord(){
        $model = Geoobjects::find()->all();
        foreach($model as $item){
        	echo $coord = $this->getXml(str_replace(" ","+",$item->title));
        	$coord = explode(" ", $coord);
        	$new = Geoobjects::findOne($item->id);
        	$new->longitude = $coord[0];
        	$new->latitude = $coord[1];
        	$new->save();
    	}
    }

    protected function getXml($str){
    	$xml = simplexml_load_file("https://geocode-maps.yandex.ru/1.x/?geocode=Нижний+Новгород+".$str);
    	return $xml->GeoObjectCollection->featureMember->GeoObject->Point->pos;
    }
}
