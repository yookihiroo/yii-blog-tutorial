<?php

use yii\db\Schema;
use yii\db\Migration;

class m150517_053011_comment extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
		    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}
		$this->createTable('{{%comment}}', [
			'id'       => Schema::TYPE_PK,
			'content'  => Schema::TYPE_TEXT. ' NOT NULL',
			'status'   => Schema::TYPE_INTEGER. ' NOT NULL',
			'create_time' => Schema::TYPE_INTEGER. '',
			'author'      => Schema::TYPE_STRING. '(128) NOT NULL',
			'email'       => Schema::TYPE_STRING . '(128) NOT NULL',
			'url'         => Schema::TYPE_STRING . '(128)',
			'post_id'     => Schema::TYPE_INTEGER . '(128) NOT NULL',
		]);
		$this->addForeignKey(
			'FK_comment_post',
			'{{%comment}}',
		   	'post_id',
			'{{%post}}',
			'id',
			'CASCADE',
			'RESTRICT'
		);	
    }

    public function down()
    {
		$this->dropForeignKey(
			'FK_comment_post',
			'{{%comment}}'
		);
		$this->dropTable('{{%comment}}');
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
