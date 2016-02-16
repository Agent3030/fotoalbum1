<?php

use yii\db\Schema;
use yii\db\Migration;

class m151113_172356_create_lam_types_table extends Migration
{
  public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%lam_types}}', [
            'id' => $this->primaryKey(),
            'lam_type' => $this->string()->notNull(),
            'size' => $this->string()->notNull(),
            'price_k'=> $this->float()->notNull(),
            
       ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%lam_types}}');
    }
}

