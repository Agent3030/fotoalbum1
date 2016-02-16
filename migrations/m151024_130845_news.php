<?php

use yii\db\Schema;
use yii\db\Migration;

class m151024_130845_news extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'short_content' => $this->string()->notNull(),
            'content' => $this->text(),
            'tag_id' => $this->smallInteger()->notNull()->defaultValue(0),
            'author' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%news}}');
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
