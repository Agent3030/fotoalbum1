<?php

use yii\db\Schema;
use yii\db\Migration;

class m151103_185935_create_covers_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%covers}}', [
            'id' => $this->primaryKey(),
            'cover_size' => $this->string()->notNull(),
            'cover_type' => $this->string()->notNull(),
            'cover_model' => $this->string()->notNull(),
          ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%covers}}');
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
