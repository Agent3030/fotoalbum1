<?php

use yii\db\Schema;
use yii\db\Migration;

class m151103_190014_create_sizes_img_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%sizes_img}}', [
            'id' => $this->primaryKey(),
            'size' => $this->string()->notNull(),
            'image_path' => $this->string()->notNull(),
           
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%sizes_img}}');
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
