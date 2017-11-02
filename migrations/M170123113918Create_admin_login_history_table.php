<?php

namespace yuncms\admin\migrations;

use yii\db\Migration;

class M170123113918Create_admin_login_history_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%admin_login_history}}', [
            'id' => $this->primaryKey(11),
            'user_id' => $this->integer()->unsigned()->notNull(),
            'ip' => $this->string()->notNull(),
            'created_at' => $this->integer()->unsigned()->notNull()
        ], $tableOptions);

        $this->addForeignKey('{{%admin_login_history_ibfk_1}}', '{{%admin_login_history}}', 'user_id', '{{%admin}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%admin_login_history}}');
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
