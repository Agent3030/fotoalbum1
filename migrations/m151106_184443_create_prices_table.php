<?php

use yii\db\Schema;
use yii\db\Migration;

class m151106_184443_create_prices_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%prices}}', [
            'id' => $this->primaryKey(),
            'kits_id' => $this->integer()->notNull(),
            'size' => $this->string()->notNull(),
            'price' => $this->float()->notNull(),
            'price_pp' => $this->float()->notNull(),
       ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%prices}}');
    }
}
