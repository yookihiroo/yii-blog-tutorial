<?php

use yii\db\Schema;
use yii\db\Migration;

class m150517_053038_lookup extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
		    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable('{{%lookup}}', [
			'id' => Schema::TYPE_PK,
			'name' => Schema::TYPE_STRING . '(128) NOT NULL',
			'code' => Schema::TYPE_INTEGER . ' NOT NULL',
			'type' => Schema::TYPE_STRING . '(128) NOT NULL',
			'position' => Schema::TYPE_INTEGER . ' NOT NULL',
		]);

    }

    public function down()
    {
		$this->dropTable('{{%lookup}}');
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
