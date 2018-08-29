<?php

use yii\db\Migration;

class m180829_005146_settings extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%settings}}', [
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'type' => 'varchar(255) NOT NULL',
            'section' => 'varchar(255) NOT NULL',
            'key' => 'varchar(255) NOT NULL',
            'value' => 'text NULL',
            'active' => 'tinyint(1) NULL',
            'created' => 'datetime NULL',
            'modified' => 'datetime NULL',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8");
        
        /* 索引设置 */
        $this->createIndex('settings_unique_key_section','{{%settings}}','section, key',1);
        
        
        /* 表数据 */
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%settings}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

