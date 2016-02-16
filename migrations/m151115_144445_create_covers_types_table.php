<?php

use yii\db\Schema;
use yii\db\Migration;

class m151115_144445_create_covers_types_table extends Migration
{
     public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%covers_types}}', [
            'id' => $this->primaryKey(),
            'cover_type' => $this->string()->notNull(),
            
            
       ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%covers_types}}');
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
