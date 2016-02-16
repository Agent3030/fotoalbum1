<?php

use yii\db\Schema;
use yii\db\Migration;

class m151103_190036_create_covers_img_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%covers_img}}', [
            'id' => $this->primaryKey(),
            'cover_type' => $this->string()->notNull(),
            'cover_model' => $this->string()->notNull(),
            'cover_model_name' => $this->string()->notNull(),
            'cover_img' => $this->string()->notNull(),
       ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%covers_img}}');
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
