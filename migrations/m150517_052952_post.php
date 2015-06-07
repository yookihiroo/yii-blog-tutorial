<?php

use yii\db\Schema;
use yii\db\Migration;

class m150517_052952_post extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
		    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable('{{%post}}', [
			'id'       => Schema::TYPE_PK,
			'title'    => Schema::TYPE_STRING . '(128) NOT NULL',
			'content'  => Schema::TYPE_TEXT. ' NOT NULL',
			'tags'     => Schema::TYPE_TEXT. '',
			'status'   => Schema::TYPE_INTEGER. ' NOT NULL',
			'create_time' => Schema::TYPE_INTEGER. '',
			'update_time' => Schema::TYPE_INTEGER. '',
			'author_id'   => Schema::TYPE_INTEGER. ' NOT NULL',
		]);
		$this->addForeignKey(
			'FK_post_author',
			'{{%post}}',
		   	'author_id',
			'{{%user}}',
			'id',
			'CASCADE',
			'RESTRICT'
		);	
    }

    public function down()
	{
		$this->dropForeignKey(
			'FK_post_author',
			'{{%post}}'
		);
		$this->dropTable('{{%post}}');
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
