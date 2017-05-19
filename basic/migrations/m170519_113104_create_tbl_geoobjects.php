<?php

use yii\db\Migration;

class m170519_113104_create_tbl_geoobjects extends Migration
{
    // public function safeUp()
    // {

    // }

    // public function safeDown()
    // {
    //     echo "m170519_113104_create_tbl_geoobjects cannot be reverted.\n";

    //     return false;
    // }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('restaurant', 'geoobject', $this->integer());
        $this->createTable('geoobjects', [
            'id' => $this->primaryKey(),
            'title' => $this->string(250),
            'latitude' => $this->float(),
            'longitude' => $this->float()
        ]);
    }

    public function down()
    {
        echo "m170519_113104_create_tbl_geoobjects cannot be reverted.\n";

        return true;
    }
    
}
