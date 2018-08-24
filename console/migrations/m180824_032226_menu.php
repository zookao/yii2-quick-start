<?php

use yii\db\Migration;

class m180824_032226_menu extends Migration
{
    public function up()
    {
        /* 取消外键约束 */
        $this->execute('SET foreign_key_checks = 0');
        
        /* 创建表 */
        $this->createTable('{{%menu}}', [
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'name' => 'varchar(128) NOT NULL',
            'parent' => 'int(11) NULL',
            'route' => 'varchar(255) NULL',
            'order' => 'int(11) NULL',
            'data' => 'blob NULL',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB  DEFAULT CHARSET=utf8");
        
        /* 索引设置 */
        $this->createIndex('parent','{{%menu}}','parent',0);
        
        /* 外键约束设置 */
        $this->addForeignKey('fk_menu_1534_00','{{%menu}}', 'parent', '{{%menu}}', 'id', 'CASCADE', 'CASCADE' );
        
        /* 表数据 */
        $this->insert('{{%menu}}',['id'=>'1','name'=>'权限相关','parent'=>NULL,'route'=>NULL,'order'=>NULL,'data'=>NULL]);
        $this->insert('{{%menu}}',['id'=>'2','name'=>'权限分配','parent'=>'1','route'=>'/admin/assignment/index','order'=>NULL,'data'=>NULL]);
        $this->insert('{{%menu}}',['id'=>'3','name'=>'权限管理','parent'=>'1','route'=>'/admin/permission/index','order'=>NULL,'data'=>NULL]);
        $this->insert('{{%menu}}',['id'=>'4','name'=>'菜单管理','parent'=>'1','route'=>'/admin/menu/index','order'=>NULL,'data'=>NULL]);
        $this->insert('{{%menu}}',['id'=>'5','name'=>'规则管理','parent'=>'1','route'=>'/admin/rule/index','order'=>NULL,'data'=>NULL]);
        $this->insert('{{%menu}}',['id'=>'6','name'=>'角色管理','parent'=>'1','route'=>'/admin/role/index','order'=>NULL,'data'=>NULL]);
        $this->insert('{{%menu}}',['id'=>'7','name'=>'路由管理','parent'=>'1','route'=>'/admin/route/index','order'=>NULL,'data'=>NULL]);
        
        /* 设置外键约束 */
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        /* 删除表 */
        $this->dropTable('{{%menu}}');
        $this->execute('SET foreign_key_checks = 1;');
    }
}

