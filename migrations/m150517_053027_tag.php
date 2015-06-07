<?php

use yii\db\Schema;
use yii\db\Migration;

class m150517_053027_tag extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
		    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable('{{%tag}}', [
			'id' => Schema::TYPE_PK,
			'name' => Schema::TYPE_STRING . '(128) NOT NULL',
			'frequency' => Schema::TYPE_INTEGER. ' NOT NULL DEFAULT 1',
		]);
    }

    public function down()
    {
		$this->dropTable('{{%tag}}');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
