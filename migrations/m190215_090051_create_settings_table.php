<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%settings}}`.
 */
class m190215_090051_create_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%settings}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'value' => $this->string(),
        ]);

        $this->insert('{{%settings}}', [
          'title' => 'Registration',
          'value' => '1',
        ]);

        $this->insert('{{%settings}}', [
          'title' => 'Homepage date',
          'value' => '16.02.2019',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%settings}}');
    }
}
