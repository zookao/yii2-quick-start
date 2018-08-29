<?php

use yii\db\Migration;

class m180829_005146_user extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%user}}', [
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'username' => 'varchar(32) NOT NULL',
            'auth_key' => 'varchar(32) NOT NULL',
            'password_hash' => 'varchar(255) NOT NULL',
            'password_reset_token' => 'varchar(255) NULL',
            'email' => 'varchar(255) NOT NULL',
            'status' => 'smallint(6) NOT NULL DEFAULT \'10\'',
            'created_at' => 'int(11) NOT NULL',
            'updated_at' => 'int(11) NOT NULL',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
        
        /* 索引设置 */
        
        
        /* 表数据 */
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%user}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

