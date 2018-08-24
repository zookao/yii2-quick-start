<?php

use yii\db\Migration;

class m180824_032226_admin extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%admin}}', [
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'username' => 'varchar(255) NOT NULL',
            'auth_key' => 'varchar(32) NOT NULL',
            'password_hash' => 'varchar(255) NOT NULL',
            'password_reset_token' => 'varchar(255) NULL',
            'email' => 'varchar(255) NOT NULL',
            'status' => 'smallint(6) NOT NULL DEFAULT \'10\'',
            'created_at' => 'int(11) NOT NULL',
            'updated_at' => 'int(11) NOT NULL',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
        
        /* 索引设置 */
        $this->createIndex('username','{{%admin}}','username',1);
        $this->createIndex('email','{{%admin}}','email',1);
        $this->createIndex('password_reset_token','{{%admin}}','password_reset_token',1);
        
        
        /* 表数据 */
        $this->insert('{{%admin}}',['id'=>'1','username'=>'admin','auth_key'=>'BAscckbHf91npOYsxfv6KCxY-nqIM5M3','password_hash'=>'$2y$13$Vvz4uhHGXNKyqTdzbBvq/OUkfrw3yLqQ108qemPF5Il2lr.GgEl9K','password_reset_token'=>NULL,'email'=>'czc@czc.com','status'=>'10','created_at'=>'1535080065','updated_at'=>'1535080065']);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%admin}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

