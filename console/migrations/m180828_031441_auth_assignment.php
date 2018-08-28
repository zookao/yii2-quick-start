<?php

use yii\db\Migration;

class m180828_031441_auth_assignment extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%auth_assignment}}', [
            'item_name' => 'varchar(64) NOT NULL',
            'user_id' => 'varchar(64) NOT NULL',
            'created_at' => 'int(11) NULL',
            'PRIMARY KEY (`item_name`,`user_id`)'
        ], "ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
        
        /* 索引设置 */
        $this->createIndex('auth_assignment_user_id_idx','{{%auth_assignment}}','user_id',0);
        
        /* 外键约束设置 */
        $this->addForeignKey('fk_auth_item_0354_00','{{%auth_assignment}}', 'item_name', '{{%auth_item}}', 'name', 'CASCADE', 'CASCADE' );
        
        /* 表数据 */
        $this->insert('{{%auth_assignment}}',['item_name'=>'超级管理员','user_id'=>'1','created_at'=>'1535080907']);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%auth_assignment}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

