<?php

use yii\db\Schema;
use yii\db\Migration;

class m150517_052929_user extends Migration
{
    public function up()
	{
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
		    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable('{{%user}}', [
			'id' => Schema::TYPE_PK,
			'username' => Schema::TYPE_STRING . '(128) NOT NULL',
			'password' => Schema::TYPE_STRING . '(128) NOT NULL',
			'email'    => Schema::TYPE_STRING . '(128) NOT NULL',
			'profile'  => Schema::TYPE_TEXT. '',
		]);
		$this->insert(
			'{{%user}}',
			[
				'username' => 'demo',
				'password' => '$2a$10$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC',
				'email'    => 'webmaster@example.com'
			]
		);
    }

    public function down()
	{
		$this->dropTable('{{%user}}');
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
